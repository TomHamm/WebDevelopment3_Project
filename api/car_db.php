<?php

session_start();

// Cars 

function getCars() {
    $query="CALL GetAllCars()";
    try{
        global $db;
        $cars = $db->query($query);
        $cars = $cars->fetchAll(PDO::FETCH_ASSOC);
        echo'{"cars": '.json_encode($cars).'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function getUsers() {
    $query="SELECT * FROM users ORDER by registrationDate";
    try{
        global $db;
        $users = $db->query($query);
        $users = $users->fetchAll(PDO::FETCH_ASSOC);
        echo'{"users": '.json_encode($users).'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function getCarById($id) {
    $query="CALL GetCarById($id)";
    try{
        global $db;
        $cars = $db->query($query);
        $car = $cars->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($car);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function getUserById($id) {
    $query="SELECT * FROM users WHERE id ='$id'";
    try{
        global $db;
        $users = $db->query($query);
        $user = $users->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($user);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function getCarByReg($regNo) {
    $query="CALL GetCarByReg($regNo)";
    try{
        global $db;
        $cars = $db->query($query);
        $car = $cars->fetchAll(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($car);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function addCar(){
    global $app;
    $request=$app->request();
    $car =  json_decode($request->getBody());
    $CarReg=$car->reg;
    $CarModel=$car->model;
    $CarTransmition=$car->transmition;
    $CarYear=$car->theYear;
    $CarColour=$car->colour;
    $CarNCT=$car->nct;
    $CarEngineSize=$car->engineSize;
    $CarPrice=$car->price;
    $query = "CALL AddCar('$CarReg', '$CarModel' , '$CarTransmition', $CarYear, '$CarColour', '$CarNCT', $CarEngineSize, $CarPrice)";
    try{ global $db;
        $db->exec($query);
        $car->id = $db->lastInsertId();
        echo json_encode($car);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
        alert($e->getMessage());
}}

function updateCar($id){
    global $app;
    $request=$app->request();
    $car =  json_decode($request->getBody());
    $CarReg=$car->reg;
    $CarModel=$car->model;
    $CarTransmition=$car->transmition;
    $CarYear=$car->theYear;
    $CarColour=$car->colour;
    $CarNCT=$car->nct;
    $CarEngineSize=$car->engineSize;
    $CarPrice=$car->price;
    $query = "CALL UpdateCar($id,'$CarReg', '$CarModel' , '$CarTransmition', $CarYear, '$CarColour', '$CarNCT', $CarEngineSize, $CarPrice)";
     try{
        global $db;
        $db->exec($query);
        echo json_encode($car);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}
function deleteCar($id)
    {
    echo $id;
    $query = "CALL DeleteCar($id)";
    echo $query;
    try {
        global $db;
        $db->exec($query);
    } catch(PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
    }
    
    
// Vans

function getVans() {
    $query="CALL GetAllVans()";
    try{
        global $db;
        $vans = $db->query($query);
        $vans = $vans->fetchAll(PDO::FETCH_ASSOC);
        echo'{"vans": '.json_encode($vans).'}';
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}


function getVanById($id) {
    $query="CALL GetVanById($id)";
    try{
        global $db;
        $vans = $db->query($query);
        $van = $vans->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($van);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}


function addVan(){
    global $app;
    $request=$app->request();
    $van =  json_decode($request->getBody());
    $VanReg=$van->regVan;
    $VanModel=$van->modelVan;
    $VanTransmition=$van->transmitionVan;
    $VanYear=$van->theYearVan;
    $VanColour=$van->colourVan;
    $VanEngineSize=$van->engineSizeVan;
    $VanPrice=$van->priceVan;
    $query = "CALL AddVan('$VanReg', '$VanModel' , '$VanTransmition', $VanYear, '$VanColour', $VanEngineSize, $VanPrice)";
    try{ global $db;
        $db->exec($query);
        $van->idVan = $db->lastInsertId();
        echo json_encode($van);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
        alert($e->getMessage());
}}


function updateVan($id){
    global $app;
    $request=$app->request();
    $van =  json_decode($request->getBody());
    $VanReg=$van->regVan;
    $VanModel=$van->modelVan;
    $VanTransmition=$van->transmitionVan;
    $VanYear=$van->theYearVan;
    $VanColour=$van->colourVan;
    $VanEngineSize=$van->engineSizeVan;
    $VanPrice=$van->priceVan;
    $query = "CALL UpdateVan($id,'$VanReg', '$VanModel' , '$VanTransmition', $VanYear, '$VanColour', $VanEngineSize, $VanPrice)";
     try{
        global $db;
        $db->exec($query);
        echo json_encode($van);
    } catch (PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
}

function deleteVan($id)
    {
    echo $id;
    $query = "CALL DeleteVan($id)";
    echo $query;
    try {
        global $db;
        $db->exec($query);
    } catch(PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
    }


//Users

    function deleteUser($id)
    {
    echo $id;
    $query = "DELETE FROM users WHERE id='$id'";
    echo $query;
    try {
        global $db;
        $db->exec($query);
    } catch(PDOException $e) {
        echo '{"error":{"text":'.$e->getMessage() .'}}';
    }
    }


?>