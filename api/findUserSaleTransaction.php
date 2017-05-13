<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/8 21:55
 */

require_once('../PhpLib/mySqlConn.php');
require_once('../PhpLib/mongoConn.php');

$rawPostBody = @file_get_contents('php://input');
$decodePostBody = urldecode($rawPostBody);
$postJson = json_decode($decodePostBody);

echo json_encode(getSaleTransactionForCustomer($postJson->customerName));

function getSaleTransactionForCustomer($customerName){
    $ret = array();
    $customer = findUserInfo($customerName);
    $customer = $customer[0];
    $customerId = $customer["customerId"];

    $results = getData("226operation.saleTransaction", ['customerId' => (int)$customerId], []);
    if (count($results) >0) {
        foreach($results as $result){
            $result = json_decode(json_encode($result), true);
            $item = [
                "factory" => $result["factoryId"],
                "brand" => $result["brandId"],
                "medicine" => $result["medicineId"],
                "store" => $result["storeId"],
                "quantity" => $result["quantity"],
                "totalPrice" => $result["totalPrice"],
                "time" => date("Y-m-d", $result["time"])
            ];

            $ret[] = $item;
        }
    }
    else {

    }
    return $ret;
}


