<?php
 // Connection data (server_address, database, name, password)
 $hostdb = 'localhost';
 $namedb = 'db_person';
 $userdb = 'root1';
 $passdb = ''; 

 echo "<a href='add.php'>Add</a>";
 echo '<form action="search.php" method="post">
  <input type="text" name="search" placeholder="First Name"/>
  <input type="submit" value="Go"/>
  </form>';

 try {
  // Connect and create the PDO object
  $conn = new PDO("mysql:host=$hostdb; dbname=$namedb", $userdb, $passdb);
  $conn->exec("SET CHARACTER SET utf8"); // Sets encoding UTF-8

  // Define and perform the SQL SELECT query
  $sql = "SELECT * FROM `tblname`";
  $result = $conn->query($sql);

  // If the SQL query is succesfully performed ($result not false)
  if($result !== false) {
  //$cols = $result->columnCount(); 
  //echo 'Number of returned columns: '. $cols. '<br />';
  // Parse the result set
  foreach($result as $row) {
  echo $row['id']. ' - '. $row['firstname']. ' - '. 
   $row['lastname'].' - <a href="delete.php?id='.$row['id'].'">Delete</a>'.'<br />' ;
  }
  }

  $conn = null; // Disconnect
 }catch(PDOException $e) {
  echo $e->getMessage();
 }
?>