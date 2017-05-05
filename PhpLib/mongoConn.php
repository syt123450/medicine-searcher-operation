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

$ary = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['comment' => 1, '_id' => 0]]);
var_dump($ary);