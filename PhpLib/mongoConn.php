<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 15:51
 */

/**
 * To catch data by collection namespace, filter and option
 * @param $collectionName
 * @param $filter
 * @param $option
 * @return array
 */
function getData($collectionName, $filter, $option){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $query = new MongoDB\Driver\Query($filter, $option);
    $readPreference = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY);
    $rows = $manager->executeQuery($collectionName, $query, $readPreference)->toArray();

    return $rows;
}

function addData($collectionName, $doc){
    $bulk = new MongoDB\Driver\BulkWrite;

    $bulk->insert($doc);

    $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $manager->executeBulkWrite($collectionName, $bulk, $writeConcern);
    return $result;
}

function addMultipleData($collectionName, $docAry){
    $bulk = new MongoDB\Driver\BulkWrite();

    foreach($docAry as $doc){
        $bulk->insert($doc);
    }

    $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $manager->executeBulkWrite($collectionName, $bulk, $writeConcern);
    return $result;
}


//$date = new DateTime();
//echo $date->getTimestamp();
//$date->setTime(0, 0, 0);
//echo $date->getTimestamp();
//echo $date->format('Y-m-d H:i:s') . "\n";
//$ary = getData("226operation.saleTransaction", ['factoryId' => 1 ], ['projection' => ['totalPrice' => 1, '_id' => 0]]);
//$ary = getData("226operation.saleTransaction", ['factoryId' => 1, 'time' => ['$gte' => $date->getTimestamp()] ], ['projection' => ['totalPrice' => 1, '_id' => 0]]);
//$ary = getData("226operation.saleTransaction", ['customerId' => 115], []);
//var_dump($ary);

//var_dump(new DateTime);

//$ary = array(
//    "ID" => "fda",
//    "Name" => "asdf"
//);
//
//var_dump(addData("226operation.searchTransaction", $ary));
