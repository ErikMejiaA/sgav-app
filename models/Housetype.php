<?php 
    namespace Models;
    class Housetype {

        //definimos las variables
        protected static $conn;
        protected static $columnsTbl = ['id_housetype', 'name_housetype'];
        private $id_housetype;
        private $name_housetype;

        public function __construct($args = [])
        {
            $this -> id_housetype = $args['id_housetype'] ?? '';
            $this -> name_housetype = $args['name_housetype'] ?? '';
        }

        //definimos la funcion para guardar los en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO housetype ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        //Cargamos todos los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_housetype, name_housetype FROM housetype";
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
                if($columna === 'id_country') continue;
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