<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/6 17:17
 */

require_once('../PhpLib/mongoConn.php');
require_once('../PhpLib/mySqlConn.php');

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
 *      "customerName" : <>,
 *      "price" : <>
 *  ]
 */
function addSaleTransaction($dataAry){
    $customerInfo =findUserInfo($dataAry["customerName"]);
    $customerInfo = $customerInfo[0];
    $customerID = (int)$customerInfo["customerId"];

    // Decide current timestamp
    $date = new DateTime();
    //    echo $date->getTimestamp();

    // Calculate total price
    $dataAry["totalPrice"] = $dataAry["price"] * $dataAry["quantity"];

    $dataAry["time"] = $date->getTimestamp();

    $dataAry["customerId"] = $customerID;
    unset($dataAry["price"]);
    unset($dataAry["customerName"]);

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
//       "customerName" => "Laurie",
//       "price" => 55
//);
//
//var_dump(addSaleTransaction($ary));