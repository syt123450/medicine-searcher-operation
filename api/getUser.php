<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/7 21:18
 */

require_once('../PhpLib/mongoConn.php');

$rawPostBody = @file_get_contents('php://input');
$decodePostBody = urldecode($rawPostBody);
$postJson = json_decode($decodePostBody);

echo findUserInfo($postJson->userName);

//get
//{"customerName": ""}

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