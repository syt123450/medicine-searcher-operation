<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/7 21:18
 */

require_once('../PhpLib/mySqlConn.php');

$rawPostBody = @file_get_contents('php://input');
$decodePostBody = urldecode($rawPostBody);
$postJson = json_decode($decodePostBody);

echo json_encode(findMedicineInfo($postJson->medicineKeyword));

