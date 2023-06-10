<?php 
    require_once("../../app.php");
    use Models\Housetype;
    $miHousetype = new Housetype();
    // se define el archivo como un tipo json
    header("Content-Type : application/json");
    //le decimos al archivo de php que obtenga cualquier tipo de entrada que le llegue y la transformamos a un 
    //array asociativo con el parametro "true", sin este parametro seria un objeto por defecto

    //obtenemmos la data en un array asociativo
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miHousetype -> saveData($_DATA);

    /* 
        INSERTing multiple rows
        $data = [
            ['John','Doe', 22],
            ['Jane','Roe', 19],
        ];
        $stmt = $pdo->prepare("INSERT INTO users (name, surname, age) VALUES (?,?,?)");
        try {
            $pdo->beginTransaction();
            foreach ($data as $row)
            {
                $stmt->execute($row);
            }
            $pdo->commit();
        }catch (Exception $e){
            $pdo->rollback();
            throw $e;
        }
    */
?>