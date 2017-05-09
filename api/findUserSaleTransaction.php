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

//echo json_encode(getSaleTransactionForCustomer($postJson->customerName));
echo json_encode(getSaleTransactionForCustomer("Valentin Marling"));

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
//                "brand" => 233333,
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

//"_id" : ObjectId("590d41b5913dbd245be94ee0"),
//	"transactionId" : 20,
//	"quantity" : 3,
//	"time" : 1522686988,
//	"medicineId" : 564,
//	"storeId" : 6,
//	"customerId" : 1580,
//	"factoryId" : 5,
//	"totalPrice" : 7873.5863883192


//return
//{
//"factory": "",
//"brand": "",
//"medicine": "",
//"store": "",
//"quantity": "",
//"totalPrice": "",
//"time": ""
//}

