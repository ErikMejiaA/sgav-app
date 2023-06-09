<?php 
    //creamos la class que nos va a permitir enviar los datos a la base de datos
    namespace Models;
    class Cities {

        // definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_city', 'name_city', 'id_region'];
        private $id_city;
        private $name_city;
        private $id_region;
        
        public function __construct($args = [])
        {
            $this -> id_city = $args['id_city'] ?? '';
            $this -> name_city = $args['name_city'] ?? '';
            $this -> id_region = $args['id_region'] ?? '';
        }

        //definimos la funcion para guardar los datos en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO cities ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        //funcion que permite cargar todos los datos de la base de datos en el HTML
        public function loadAllData() {
            $sql = "SELECT id_city, name_city, id_region FROM cities";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $miSgav = $stmt -> fetchAll(\PDO :: FETCH_ASSOC);
            return $miSgav;
        }

        public static function setConn($connBd) {
            self :: $conn = $connBd;
        }

        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_city') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }

        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }
    }
?>