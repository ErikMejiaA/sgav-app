<?php 
    require_once('app.php');
    use Models\Countries;
    $objCountries = new Countries();
    $datosCountries = $objCountries -> loadAllData();
    
    /*echo "<br/>";
    echo "<pre>";
    print_r($datosCountries);
    echo "</pre>";*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script src="js/jquery-3.6.4.slim.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="controllers/countriesController.js" type="text/javascript" defer></script>

    <title>S-G-A-V App</title>
</head>
<body>

    <header>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.jpg" alt="Logo app SGAV" id="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <nav></nav>

    <main>
        <div class="container mt-3">
            <h1 class="text-center">SISTEMA PARA LA GESTION Y ALQUILER DE VIVIENDA SGAV</h1>
        </div>
        

        <div class="container mt-3 text-center" id="countries">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE LAS CIUDADES</h5>
                <div class="card-body">
                <form id="formCountries">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                   
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="name_country" class="form-label">Ingrese el nombre de la ciudad:</label>
                                        <input type="text" class="form-control" id="name_country" name="name_country">
                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success enviar" id="btnCountries">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <footer></footer>
    
</body>
</html>