<?php 
    require_once('app.php');
    use Models\Countries;
    use Models\Regions;
    use Models\Cities;
    use Models\Persons;
    use Models\Housetype;
    use Models\Living_place;

    $objCountries = new Countries();
    $datosCountries = $objCountries -> loadAllData();

    /*echo "<br/>";
    echo "<pre>";
    print_r($datosCountries);
    echo "</pre>";*/

    $objRegions = new Regions();
    $datosRegions = $objRegions -> loadAllData();
    
    /*echo "<br/>";
    echo "<pre>";
    print_r($datosRegions);
    echo "</pre>";*/

    $objCities = new Cities();
    $datosCities = $objCities -> loadAllData();

    /*echo "<br/>";
    echo "<pre>";
    print_r($datosCities);
    echo "</pre>";*/

    $objPersons = new Persons();
    $datosPersons = $objPersons -> loadAllData();

    /*echo "<br/>";
    echo "<pre>";
    print_r($datosPersons);
    echo "</pre>";*/

    $objHousetype = new Housetype();
    $datosHousetype = $objHousetype -> loadAllData();

    /*echo "<br/>";
    echo "<pre>";
    print_r($datosHousetype);
    echo "</pre>";*/

    $objLiving_place = new Living_place();
    $datosLiving_place = $objLiving_place -> loadAllData();

    /*echo "<br/>";
    echo "<pre>";
    print_r($datosLiving_place);
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
    <script src="controllers/regionsController.js" type="text/javascript" defer></script>
    <script src="controllers/citiesController.js" type="text/javascript" defer></script>
    <script src="controllers/personsController.js" type="text/javascript" defer></script>
    <script src="controllers/housetypeContoller.js" type="text/javascript" defer></script>
    <script src="controllers/living_placeController.js" type="text/javascript" defer></script>


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
        
        <!--Form de Countries-->
        <div class="container mt-3 text-center" id="countries">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE LOS PAISES</h5>
                <div class="card-body">
                <form id="formCountries">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                   
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="name_country" class="form-label">Ingrese el nombre del pais:</label>
                                        <input type="text" class="form-control" id="name_country" name="name_country">
                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnCountries">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form de Regions-->
        <div class="container mt-3 text-center" id="regions">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE LAS REGIONES</h5>
                <div class="card-body">
                <form id="formRegions">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">

                                        <label for="id_country" class="form-label">Pais</label>
                                        <select class="form-select" name="id_country" id="id_country">
                                            <option selected>Seleccione un pais:</option>
                                            <?php foreach ($datosCountries as $itemCountries) { ?>
                                                <option value="<?php echo $itemCountries['id_country'];?>"><?php echo $itemCountries['name_country'];?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="name_region" class="form-label">Ingrese el nombre de la region:</label>
                                        <input type="text" class="form-control" id="name_region" name="name_region">
                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnRegions">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form de cities-->
        <div class="container mt-3 text-center" id="cities">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE LAS CIUDADES</h5>
                <div class="card-body">
                <form id="formCities">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">

                                        <label for="id_region" class="form-label">Region</label>
                                        <select class="form-select" name="id_region" id="id_region">
                                            <option selected>Seleccione una region:</option>
                                            <?php foreach ($datosRegions as $itemRegions) { ?>
                                                <option value="<?php echo $itemRegions['id_region'];?>"><?php echo $itemRegions['name_region'];?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="name_city" class="form-label">Ingrese el nombre de la ciudad:</label>
                                        <input type="text" class="form-control" id="name_city" name="name_city">
                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnCities">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form de persons-->
        <div class="container mt-3 text-center" id="persons">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE LAS PERSONAS</h5>
                <div class="card-body">
                <form id="formPersons">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="id_person" class="form-label">Ingrese el ID de la persona:</label>
                                        <input type="text" class="form-control" id="id_person" name="id_person">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="firstname_person" class="form-label">Ingrese el nombre:</label>
                                        <input type="text" class="form-control" id="firstname_person" name="firstname_person">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="lastname_person" class="form-label">Ingrese el Apellido:</label>
                                        <input type="text" class="form-control" id="lastname_person" name="lastname_person">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="birthdate_person" class="form-label">Ingrese la fecha de Cumpleaños:</label>
                                        <input type="date" class="form-control" id="birthdate_person" name="birthdate_person">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">

                                        <label for="id_city" class="form-label">Ciudad:</label>
                                        <select class="form-select" name="id_city" id="id_city">
                                            <option selected>Seleccione una Ciudad:</option>
                                            <?php foreach ($datosCities as $itemCities) { ?>
                                                <option value="<?php echo $itemCities['id_city'];?>"><?php echo $itemCities['name_city'];?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnPersons">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form de Housetype-->
        <div class="container mt-3 text-center" id="housetype">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DE TIPO DE CASA</h5>
                <div class="card-body">
                <form id="formHousetype">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                   
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="name_housetype" class="form-label">Ingrese el nombre del tipo de casa:</label>
                                        <input type="text" class="form-control" id="name_housetype" name="name_housetype">
                                    </div>
                                </div>
                                <div class="col-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnHousetype">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Form de living_place-->
        <div class="container mt-3 text-center" id="living_place">
            <div class="card">
                <h5 class="card-header text-center">REGISTRO DEL LUGAR PARA VIVIR</h5>
                <div class="card-body">
                <form id="formLiving_place">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">

                                        <label for="id_person" class="form-label">Nombre y Apellido:</label>
                                        <select class="form-select" name="id_person" id="id_person">
                                            <option selected>Seleccione una Persona</option>
                                            <?php foreach($datosPersons as $itemPersons) { ?>
                                                <option value="<?php echo $itemPersons['id_person']; ?>"><?php echo $itemPersons['firstname_person'] .' '.$itemPersons['lastname_person']; ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">

                                        <label for="id_city" class="form-label">Ciudad:</label>
                                        <select class="form-select" name="id_city" id="id_city">
                                            <option selected>Seleccione una Ciudad:</option>
                                            <?php foreach ($datosCities as $itemCities) { ?>
                                                <option value="<?php echo $itemCities['id_city'];?>"><?php echo $itemCities['name_city'];?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="rooms_living" class="form-label">Ingrese el numero de Habitaciones:</label>
                                        <input type="number" class="form-control" id="rooms_living" name="rooms_living" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="bathrooms_living" class="form-label">Ingrese el numero de Baños:</label>
                                        <input type="number" class="form-control" id="bathrooms_living" name="bathrooms_living" min="0">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="kitchen_living" class="form-label">Ingrese el numero de Cocinas:</label>
                                        <input type="number" class="form-control" id="kitchen_living" name="kitchen_living" min="0">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="tvroom_living" class="form-label">Ingrese el numero de TV:</label>
                                        <input type="number" class="form-control" id="tvroom_living" name="tvroom_living" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for=" patio_living" class="form-label">Ingrese el numero de Patios:</label>
                                        <input type="number" class="form-control" id=" patio_living" name=" patio_living" min="0">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for=" pool_living" class="form-label">Ingrese el numero de Pisinas:</label>
                                        <input type="number" class="form-control" id=" pool_living" name=" pool_living" min="0">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="barbecue_living" class="form-label">Ingrese el numero de Parrillas:</label>
                                        <input type="number" class="form-control" id="barbecue_living" name="barbecue_living" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for=" image_living" class="form-label">Ingrese la foto:</label>
                                        <input type="file" class="form-control" id="image_living" name="image_living">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="id_housetype" class="form-label">Tipo Casa:</label>
                                        <select class="form-select" name="id_housetype" id="id_housetype">
                                            <option selected>Seleccione un tipo de casa:</option>
                                            <?php foreach ($datosHousetype as $itemHousetype) { ?>
                                                <option value="<?php echo $itemHousetype['id_housetype'];?>"><?php echo $itemHousetype['name_housetype'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success" id="btnLiving_place">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <footer></footer>
    
</body>
</html>