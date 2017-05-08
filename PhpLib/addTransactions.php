<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/6 17:17
 */

require_once('../PhpLib/mongoConn.php');

/**
 * @param $dataAry
 * @return \MongoDB\Driver\WriteResult
 *
 *  [
 *      "quantity" : <>,
 *      "medicineId" : <>,
 *      "brandId" : <>,
 *      "factoryId" : <>,
 *      "storeId" : <>,
 *      "customerId" : <>,
 *      "price" : <>
 *  ]
 */
function addSaleTransaction($dataAry){
    // Decide current timestamp
    $date = new DateTime();
    //    echo $date->getTimestamp();

    // Calculate total price
    $dataAry["totalPrice"] = $dataAry["price"] * $dataAry["quantity"];
    $dataAry["time"] = $date->getTimestamp();
    unset($dataAry["price"]);

    return addData("226operation.saleTransaction", $dataAry);
}

function addSearchTransaction($dataAry){
    // Decide current timestamp
    $date = new DateTime();
    //    echo $date->getTimestamp();

    return addMultipleData("226operation.searchTransaction", $dataAry);
}

//$ary = array(
//       "quantity" => 100,
//       "medicineId" => 48,
//       "brandId" => 66,
//       "factoryId" => 77,
//       "storeId" => 76,
//       "customerId" => 123,
//       "price" => 55
//);
//
//var_dump(addSaleTransaction($ary));