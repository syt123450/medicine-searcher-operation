<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 16:12
 */

require_once('../PhpLib/mongoConn.php');

/*
 *  Sample returned JSON array format
 *
 *  [ 10, 15, 15, 20, 5, 25 ]
 *
 */


/**
 * Calculate current percentage of transaction based on factory
 */
function virturalData(){

    /* Collect data for each factory */
    // Limit date to current date only
    $date = new DateTime();
    $date->setTime(0, 0, 0);
//    echo $date->getTimestamp();

    // Catch data for each factory
    $factorySums = array();
    $totalSum = 0;
    for($i =1; $i <7; $i++){
        $results = getData("226operation.saleTransaction", ['factoryId' => $i, 'time' => ['$gte' => $date->getTimestamp()] ], ['projection' => ['totalPrice' => 1, '_id' => 0]]);
        $saleSum = 0;
        if (count($results) >0){
            foreach($results as $result){
                $result = json_decode(json_encode($results[0]), true);
                $saleSum += $result["totalPrice"];
            }
        }
        else {
            // No trasaction for at the moment
        }
//        echo "saleSum: $saleSum \n";
        $totalSum += $saleSum;

        $factorySums[] =$saleSum;
    }

    $ret = array();
    foreach ($factorySums as $fs){
        if ($fs !=0){
            $ret[] = $fs/$totalSum * 100;
        }
        else {
            $ret[] =0;
        }
    }

    echo json_encode($ret);

}

virturalData();