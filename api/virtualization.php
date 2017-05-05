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

    getData("226operation.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['comment' => 1, '_id' => 0]]);
}