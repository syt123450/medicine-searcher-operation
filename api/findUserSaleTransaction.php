<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/8 21:55
 */

require_once('../PhpLib/mongoConn.php');

$rawPostBody = @file_get_contents('php://input');
$decodePostBody = urldecode($rawPostBody);
$postJson = json_decode($decodePostBody);