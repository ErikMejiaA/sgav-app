<?php 
    //creamos la class que nos va a permitir enviar los datos a la base de datos
    namespace Models;
    class Countries {

        //definimos las variables
        protected static $conn;
        protected static $columnsTbl = ['id_country', 'name_country'];
        private $id_country;
        private $name_country;

        public function __construct($args = [])
        {
            $this -> id_country = $args['id_country'] ?? '';
            $this -> name_country = $args['name_country'] ?? '';
        }

        //definimos la funcion para guardar los en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO countries ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        //Cargamos todos los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_country, name_country FROM countries";
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
                if($columna === 'idPais') continue;
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