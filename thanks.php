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
    if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
        // Form has already been submitted, handle the duplicate submission
        include_once "./templates/_handleDuplicatesPage.html.php";
    } else {
    $name = $_POST['name'];
    $meal = $_POST['meal'];
    $coffee = $_POST['coffee'];

    // capture the errors
    $errors = [];

    //initiate the current order object
    $order = new Order();
    $order->setCustomerName($name);
    $order->setItemId($meal);
    $order->setCoffee($coffee);

    $order->insertOrder();

    //get the current inventory quantity of the item
    $inventoryQuantity = $order->getInventoryQuantity($meal)["inventory"];
    $inventoryQuantity--;  
    $order->updateInventoryQuantity($meal,$inventoryQuantity);

    //update inventory quantity after order has been inserted


    include_once "./templates/_thanksPage.html.php";
    $_SESSION['form_submitted'] = true;
    //prevent user refresh the page, automatically redirect to the thanks page after form has been submitted
    header("Location: thanks.php");
    }
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
