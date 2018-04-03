<?php
/*
   Adapter class for the PDO API. This version is quite simple, in that it doesn't make
   use of an interface
*/
class DatabaseHelper {
    public static function createConnectionInfo($values=array()) {
        $connString = $values[0];
        $user = $values[1];
        $password = $values[2];
        $pdo = new PDO($connString,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        
    }
    
    
 public static function runQuery($connection, $sql, $parameters=array()) {
     if (!is_array($parameters)) {
         $parameters = array($parameters);
         
     }
     $statement = null;
     if (count($parameters) > 0) {
         $statement = $connection->prepare($sql);
         $executedOk = $statement->execute($parameters);
         if (! $executedOk) {
             throw new PDOException;
         }
         
     } else {
         $statement = $connection->query($sql);
         if (!$statement) {
             throw new PDOException;
         }
     }
     return $statement;
     
 }
}

?>
