<?php 
    namespace Models;
    class Living_place {

        //definimos las variables
        protected static $conn;
        protected static $columnsTbl = ['id_living', 'id_person', 'id_city', 'rooms_living', 'bathrooms_living', 'kitchen_living', 'tvroom_living', 'patio_living', 'pool_living', 'barbecue_living', 'image_living', 'id_housetype'];
        private $id_living;
        private $id_person;
        private $id_city;
        private $rooms_living;
        private $bathrooms_living;
        private $kitchen_living;
        private $tvroom_living;
        private $patio_living;
        private $pool_living;
        private $barbecue_living;
        private $image_living;
        private $id_housetype;

        public function __construct($args = [])
        {
            $this -> id_living = $args['id_living'] ?? '';
            $this -> id_person = $args['id_person'] ?? '';
            $this -> id_city = $args['id_city'] ?? '';
            $this -> rooms_living = $args['rooms_living'] ?? '';
            $this -> bathrooms_living = $args['bathrooms_living'] ?? '';
            $this -> kitchen_living = $args['kitchen_living'] ?? '';
            $this -> tvroom_living = $args['tvroom_living'] ?? '';
            $this -> patio_living = $args['patio_living'] ?? '';
            $this -> pool_living = $args['pool_living'] ?? '';
            $this -> barbecue_living = $args['barbecue_living'] ?? '';
            $this -> image_living = $args['image_living'] ?? '';
            $this -> id_housetype = $args['id_housetype'] ?? '';
        }

        
        //definimos la funcion para guardar los en la base de datos
        public function saveData($data) {
            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO living_place ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute($data);
        }

        
        //Cargamos todos los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_living, id_person, id_city, rooms_living, bathrooms_living, kitchen_living, tvroom_living, patio_living, pool_living, barbecue_living, image_living, id_housetype FROM living_place";
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