<?php 

    //Cumple la misma funcion que el app.j, para importar todas las classe 
    require_once 'vendor/autoload.php';
    use App\Database;
    use Models\Countries;

    $db = new Database();
    $conn = $db -> getConnection('mysql');
    Countries :: setConn($conn);
    
    
?>