<?php
require_once 'config.php';

// function insert
function crud($sql, $_params)
{
  global $connect;

  try {

    // prepare statement, bind params, execute
    $stmt = $connect->prepare($sql);
  
    $params = $_params;
  
    $stmt->execute($params);
  
    return true;

  } catch (PDOException $e) {
    return $e->getMessage();
  }
  
}
 
// method select
function select($sql, $_params)
{
  global $connect;
  
  try {
    // prepare statement, bind params, execute
    $stmt = $connect->prepare($sql);
    
    $params = $_params;
    
    $stmt->execute($params);
    
    // fetch data nya
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $row;
    
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}

// method select all
function selectAll($sql, $_params)
{
  global $connect;

  try {
    // prepare statement, bind params, execute
    $stmt = $connect->prepare($sql);

    $params = $_params;

    $stmt->execute($params);

    // fetch data nya
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows;

  } catch (PDOException $e) {
    return $e->getMessage();

  }
}
