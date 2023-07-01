<?php

/**
 * Defines a Order (part of the business logic layer)
 */
class Order
{
  /*
   * Private properties
   */
  private $_orderId;
  private $_customerName;
  private $_itemId;
  private $_coffee;
  private $_db;

  /*
   * Constructor - sets up the database connection (using DBAccess)
   */

  public function __construct()
  {
    // Create database connection and store into _db property so other methods can use DBAccess
    require "includes/database.php";
    $this->_db = $db;
  }

  /*
   * Getter and setter methods
   */

  /**
   * Get order ID (there is NO setter for category ID to make it read-only)
   *
   * @return int The category ID
   */
  public function getOrderId()
  {
    return $this->_orderId;
  }

  /**
   * Get customer name
   *
   * @return string The customer name
   */
  public function getCustomerName()
  {
    return $this->_customerName;
  }

  /**
   * Set customer name
   *
   * @param  string $customerName The new customer name
   * @return void
   */
  public function setCustomerName($customerName)
  {
   
      $this->_customerName = $customerName;

  }

  /**
   * Get id of the item 
   *
   * @return string The item id
   */
  public function getItemId()
  {
    return $this->_itemId;
  }

  /**
   * Set item id
   *
   * @param  int $id the id of the item
   * @return void
   */
  public function setItemId($id)
  {
   
      $this->_itemId = $id;

  }


  /**
   * Get the coffee
   *
   * @return String The coffee
   */
  public function getCoffee()
  {
    return $this->_coffee;
  }

  /**
   * Set item id
   *
   * @param  String $id the id of the item
   * @return void
   */
  public function setCoffee($coffee)
  {
   
      $this->_coffee = $coffee;

  }

  /**
   * Get a order by ID and populate the object's properties
   *
   * @param  int $id The ID of the order to get
   * @return void
   */
  public function getOrder($id)
  {
    try {
      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  *
        FROM    orders
        WHERE   orderId = :orderId
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindParam(":orderId", $id, PDO::PARAM_INT);

      // Execute query
      $rows = $this->_db->executeSQL($stmt);

      //check if the category exists
      if (count($rows) ===0 ) {
        return false;
      }

      // Get the first (and only) row - we are searching by a unique primary key
      $row = $rows[0];

      // Populate the private properties with the retrieved values
      $this->_orderId = $row["orderId"];
      $this->_customerName = $row["customerName"];
      $this->_itemId = $row["itemId"];
      $this->_coffee = $row["coffee"];
      return true;
    } catch (PDOException $e) {
      
      // Throw the exception back up a level (don't handle it here)
      throw $e;
    }
  }


  /**
   * Get all orders
   *
   * @return array The collection of all orders
   */
  public function getOrders()
  {
    try {
      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  *
        FROM    orders
      SQL;
      $stmt = $this->_db->prepareStatement($sql);

      // Execute SQL
      $rows = $this->_db->executeSQL($stmt);
      return $rows;

    } catch (PDOException $e) {
      throw $e;
    }
  }

  /**
   * Add a order using values in object's properties
   *
   * @return int The ID of the new order
   */
  public function insertOrder()
  {
    try {
      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        INSERT INTO orders (customerName, itemId, coffee)
        VALUES (:customerName, :itemId, :coffee)
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindParam(":customerName", $this->_customerName, PDO::PARAM_STR);
      $stmt->bindParam(":itemId", $this->_itemId, PDO::PARAM_INT);
      $stmt->bindParam(":coffee", $this->_coffee, PDO::PARAM_STR);
      

      // Execute SQL setting the second parameter to true means the primary key will be returned
      $value = $this->_db->executeNonQuery($stmt, true);
      return $value;

    } catch (PDOException $e) {
      throw $e;
    }
  }


  /**
   * Get a item name with the ID
   *
   * @param  int $id The ID of the order to get
   * @return string the item name of the item id
   */
  public function getItemName($id)
  {
    try {
      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        SELECT  itemName
        FROM    item
        WHERE   itemId = :itemId
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindParam(":itemId", $id, PDO::PARAM_INT);

      // Execute query
      $rows = $this->_db->executeSQL($stmt);

      //check if the category exists
      if (count($rows) ===0 ) {
        return false;
      }

      // Get the first (and only) row - we are searching by a unique primary key
      $row = $rows[0];

      // Populate the private properties with the retrieved values
      return $row;
    } catch (PDOException $e) {
      
      // Throw the exception back up a level (don't handle it here)
      throw $e;
    }
  }


  /**
   * Remove an order using the ID
   *
   * @param  int $id The ID of the order to get
   * @return bool True if delete successful
   */
  public function removeOrder($id)
  {
    try {
      // Open database connection
      $this->_db->connect();

      // Define SQL query, prepare statement, bind parameters
      $sql = <<<SQL
        DELETE  
        FROM    orders
        WHERE   orderId = :orderId
      SQL;
      $stmt = $this->_db->prepareStatement($sql);
      $stmt->bindParam(":orderId", $id, PDO::PARAM_INT);

     // Execute SQL
      $value = $this->_db->executeNonQuery($stmt, false);
      return $value;

    } catch (PDOException $e) {
      
      // Throw the exception back up a level (don't handle it here)
      throw $e;
    }
  }
}

