<?php 

    //Cumple la misma funcion que el app.j, para importar todas las classe 
    require_once 'vendor/autoload.php';
    use App\Database;
    use Models\Countries;
    use Models\Regions;
    use Models\Cities;
    use Models\Persons;

    $db = new Database();
    $conn = $db -> getConnection('mysql');
    Countries :: setConn($conn);
    Regions :: setConn($conn);
    Cities :: setConn($conn);
    Persons :: setConn($conn);
    
    
?>