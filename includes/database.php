<?php

require_once "classes/DBAcess.php";
/**
 * A PHP class to provide access to a MySQL database
 */

if (
    $_SERVER['SERVER_NAME'] === 'localhost' ||
    $_SERVER['Server_ADDR'] === "127.0.0.1" ||
    $_SERVER['Server_ADDR'] === "::1" 
) {
    // database config - local
    $dbServer = "localhost";
    $dbDatabase = "cateringorder";
    $dbUsername = "root";
    $dbPassword = "";
    $relativeurl = $_SERVER['SERVER_NAME'] . ":8080/catering-order/";
} else {
    // database config - remote
    $dbServer = "sql212.infinityfree.com";
    $dbDatabase = "if0_34534016_cateringorder";
    $dbUsername = "if0_34534016";
    $dbPassword = "j87YVkuOfvLk6";
    $relativeurl = $_SERVER['SERVER_NAME'] . "/";
}

// Create a new instance of database connection
$db = new DBAccess($dbServer, $dbDatabase, $dbUsername, $dbPassword);
