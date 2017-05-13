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
    "factoryId" => (int)$postJson->factoryId,
    "brandId" => (int)$postJson->brandId,
    "medicineId" => (int)$postJson->medicineId,
    "storeId" => (int)$postJson->storeId,
    "price" => (double)$postJson->price,
    "quantity" => (int)$postJson->quantity,
    "customerName" => $postJson->customerName
);

echo json_encode(addSaleTransaction($dataAry));