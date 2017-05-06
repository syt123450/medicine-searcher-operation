<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 16:37
 */

require_once('../PhpLib/mongoConn.php');

function findSaleTransaction(){
    // Limit date to current date only
    $date = new DateTime();
    $date->setTime(0, 0, 0);

    $results = getData("226operation.saleTransaction", ['time' => ['$gte' => $date->getTimestamp()] ], ['projection' => ['_id' => 0]]);

    $results = json_decode(json_encode($results), true);

    echo json_encode($results);
}

findSaleTransaction();