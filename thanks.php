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
$title = "Thanks";

// Start output buffering (trap output, don't display it yet)
ob_start();

if(isset($_POST['order'])) {
    $name = $_POST['name'];
    $meal = $_POST['meal'];
    $coffee = $_POST['coffee'];

    $order = new Order();
    $order->setCustomerName($name);
    $order->setItemId($meal);
    $order->setCoffee($coffee);

    $order->insertOrder();
    include_once "./templates/_thanksPage.html.php";
} else {
    
    // Include the page-specific template
include_once "./templates/_thanksPage.html.php";
}


// include_once "./homePage.html.php";


// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
