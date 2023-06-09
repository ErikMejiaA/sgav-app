<?php 

    //creamos la class que nos va a permitir enviar los datos a la base de datos
    namespace Models;
    class Regions {

        // definimos las varibles
        protected static $conn;
        protected static $columnsTbl = ['id_region', 'name_region', 'id_country '];
        private $id_region;
        private $name_region;
        private $id_country;
        
        public function __construct($args = [])
        {
            $this -> id_region = $args['id_region'] ?? '';
            $this -> name_region = $args['name_region'] ?? '';
            $this -> id_country = $args['id_country'] ?? '';
        }

        //definimos la funcion para guardar los datos en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO regions ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        //funcion que permite cargar todos los datos de la base de datos en el HTML
        public function loadAllData() {
            $sql = "SELECT id_region, name_region, id_country FROM regions";
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
                if($columna === 'id_region') continue;
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