<?php 

    //Cumple la misma funcion que el app.j, para importar todas las classe 
    require_once 'vendor/autoload.php';
    use App\Database;
    use Models\Countries;
    use Models\Regions;
    use Models\Cities;
    use Models\Persons;
    use Models\Housetype;
    use Models\Living_place;

    $db = new Database();
    $conn = $db -> getConnection('mysql'); //conexion con mysql
    //$conn = $db -> getConnection('pgsql');   // conexion con postgres
    Countries :: setConn($conn);
    Regions :: setConn($conn);
    Cities :: setConn($conn);
    Persons :: setConn($conn);
    Housetype :: setConn($conn);
    Living_place :: setConn($conn);
    
    
?>