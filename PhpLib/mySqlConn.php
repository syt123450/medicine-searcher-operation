<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 23:56
 */

function emptyResult(){
    print("<title>No Result</title><body><strong>Sorry, we can't find any result.</strong><br/></body>");
}

function findUserInfo($nameProvided){
    $query = "SELECT customerId, gender, name FROM Customer WHERE name like '%$nameProvided%'";

    try {
        // $con = new PDO ("mysql:host=54.67.4.28:3306;dbname=cmpe272", "cmpe272", "cmpe272pw");
        $con = new PDO ("mysql:host=localhost;dbname=226operation", "ultimate", "sesame");
        $con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

        $stmt = $con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll( PDO::FETCH_ASSOC );

        return $data;

    } catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function findMedicineInfo($medicineName){
    $query = "SELECT ".
                "m.medicineId, m.medicineName, m.price, " .
                "b.brandId, b.brandName, " .
                "f.factoryId, f.factoryName, " .
                "s.storeId, s.StoreName " .
              "FROM " .
                "Medicine m, Brand b, Factory f, Store s " .
              "WHERE " .
                "m.brandId = b.brandId " .
              "AND " .
                "b.factoryId =f.factoryId " .
              "AND " .
                "m.storeID = s.storeID " .
              "AND " .
                "medicineName like '%$medicineName%'";

    try {
        // $con = new PDO ("mysql:host=54.67.4.28:3306;dbname=cmpe272", "cmpe272", "cmpe272pw");
        $con = new PDO ("mysql:host=localhost;dbname=226operation", "ultimate", "sesame");
        $con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

        $stmt = $con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll( PDO::FETCH_ASSOC );

        return $data;

    } catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

//$data = "";
//$data =findUserInfo("Laurie");
//$data =findMedicineInfo("TENUI");
//var_dump($data);