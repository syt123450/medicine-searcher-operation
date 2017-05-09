<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/7 21:25
 */

require_once('../PhpLib/addTransactions.php');

$rawPostBody = @file_get_contents('php://input');
$decodePostBody = urldecode($rawPostBody);
$postJson = json_decode($decodePostBody);

$dataAry = array(
    "factoryId" => $postJson->factoryId,
    "brandId" => $postJson->brandId,
    "medicineId" => $postJson->medicineId,
    "storeId" => $postJson->storeId,
    "price" => $postJson->price,
    "quantity" => $postJson->quantity,
    "customerName" => $postJson->customerName
);

echo json_encode(addSaleTransaction($dataAry));