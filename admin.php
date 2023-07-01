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
$title = "Admin";

// Start output buffering (trap output, don't display it yet)
ob_start();

$ordersObj = new Order();
$orders = $ordersObj->getOrders();

//assign different values to preserve states
$dataItemId = 0;

if(isset($_POST["completed"])) {
    $orderId = $_POST["orderId"];
    $ordersObj->removeOrder($orderId);

    //refreshes page after removing the order
    header("Location: ".$_SERVER['PHP_SELF']);
    include_once "./templates/_adminPage.html.php";
}

// Include the page-specific template
include_once "./templates/_adminPage.html.php";


// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
