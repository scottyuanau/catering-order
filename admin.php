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



// if user is not logged in, redirect to the login page
if (!isset($_SESSION['user']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
}

// if user is not admin, advise user that only admin is allowed
if ($_SESSION['username'] !== 'admin') {
    echo "Only admin is allowed to access this page";
}



// Check if the user is not logged in as admin
if (isset($_SESSION['user']) && $_SESSION['username'] === 'admin' ) {




$ordersObj = new Order();
$orders = $ordersObj->getOrders();
$inventories = $ordersObj->getAllInventories();


//assign different values to preserve states
$dataItemId = 0;

//get items available


if(isset($_POST["completed"])) {
    $orderId = $_POST["orderId"];
    $ordersObj->removeOrder($orderId);

    //refreshes page after removing the order
    header("Location: ".$_SERVER['PHP_SELF']);
    include_once "./templates/_adminPage.html.php";
} else if (isset($_POST["setQuantity1"])) {
    $itemId = $_POST["item1"];
    $quantity = $_POST["itemQuantity1"];

    //update the inventory
    $ordersObj->updateInventoryQuantity($itemId,$quantity);
    //refreshes page after removing the order
    header("Location: ".$_SERVER['PHP_SELF']);
    include_once "./templates/_adminPage.html.php";
} 
else if (isset($_POST["setQuantity2"])) {
    $itemId = $_POST["item2"];
    $quantity = $_POST["itemQuantity2"];

    //update the inventory
    $ordersObj->updateInventoryQuantity($itemId,$quantity);
    
    //refreshes page after removing the order
    header("Location: ".$_SERVER['PHP_SELF']);
    include_once "./templates/_adminPage.html.php";
}
else if (isset($_POST["setQuantity3"])) {
    $itemId = $_POST["item3"];
    $quantity = $_POST["itemQuantity3"];

    //update the inventory
    $ordersObj->updateInventoryQuantity($itemId,$quantity);
    
    //refreshes page after removing the order
    header("Location: ".$_SERVER['PHP_SELF']);
    include_once "./templates/_adminPage.html.php";
}

// Include the page-specific template
include_once "./templates/_adminPage.html.php";
}

// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";



// Functions to handle loading data into the form

/**
 * Set an HTML-safe value of a form field from $_POST data.
 * @param string $fieldName The name of field to display.
 * @return string The HTML entity encoded output for the form field.
 */
function setValue($fieldName)
{
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

/**
 * Return the "checked" attribute if the field value is checked.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "checked" attribute if field value is checked.
 */
function setChecked($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "checked" : "";

    // if (isset($_POST[$fieldName]) && $_POST[$fieldName] === $fieldValue) {
    //   return "checked";
    // }

    // return "";
}

/**
 * Return the "selected" attribute if the field value is selected.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "selected" attribute if field value is selected.
 */
function setSelected($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "selected" : "";
}


// Close database connection
$db->disconnect();
