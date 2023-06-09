<?php 

    //creamos la clase qie mos va a permitir enviar los datos a la base de datos
    namespace Models;
    class Persons {

        //definimos las variables
        protected static $conn;
        protected static $columnsTbl = ['id_person', 'firstname_person', 'lastname_person', 'birthdate_person', 'id_city'];
        private $id_person;
        private $firstname_person;
        private $lastname_person;
        private $birthdate_person;
        private $id_city;

        public function __construct($args = [])
        {
            $this -> id_person = $args['id_person'] ?? '';
            $this -> firstname_person = $args['firstname_person'] ?? '';
            $this -> lastname_person = $args['lastname_person'] ?? '';
            $this -> birthdate_person = $args['birthdate_person'] ?? '';
            $this -> id_city = $args['id_city'] ?? '';
        }

        //definimos la funcion para guardar los en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO persons ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        //Cargamos todos los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_person, firstname_person, lastname_person, birthdate_person, id_city FROM persons";
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