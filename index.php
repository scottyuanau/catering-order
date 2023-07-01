<?php
// start session
session_start();

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/OrderClass.php";

// Open database connection
$db->connect();

// Config
$title = "Home";

// Start output buffering (trap output, don't display it yet)
ob_start();

//get all current orders
$ordersObj = new Order();
$meal1Quantity = $ordersObj->getInventoryQuantity(1)["inventory"];
$meal2Quantity = $ordersObj->getInventoryQuantity(2)["inventory"];
$meal3Quantity = $ordersObj->getInventoryQuantity(3)["inventory"];

// Include the page-specific template
include_once "./templates/_homePage.html.php";


// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
