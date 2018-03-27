<?php
abstract class TableDataGateway
{
    protected $connection;
    
    public function __construct($connect) {
        if (is_null($connect)) {
            throw new Exceptionm("Connection is null");
        }
        $this->connection = $connect;
    }
    
    abstract protected function getSelectStatement();
    
    abstract protected function getOrderFields();
    
    abstract protected function getPrimaryKeyName();
    
    abstract protected function getPageName();
    
    abstract protected function getLabel();
    
    
    public function findAll($sortFields=null) {
        $sql = $this->getSelectStatement();
        if (!is_null($sortFields)) {
            $sql .= ' ORDER BY ' . $sortFields;
        }
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll();
    }
    
    public function findAllSorted($ascending) {
        $sql = $this->getSelectStatement() . 'GROUP BY ' . $this->getOrderFields() . ' ORDER BY ' . $this->getOrderFields();
        if (! $ascending) {
            $sql .= " DESC";
        }
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll();
    }
    
    public function findById($id) {
        $sql = $this->getSelectStatement() . ' WHERE ' . $this->getPrimaryKeyName() . '=:id';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
        return $statement->fetch();
    }
    
    //NOTE ! Please note that the query used in the findByID function will be associated to the instance of the gateway object  
   public function IDExists($id) {
        $exists = false;
        $row = $this->findById($id);
        if($row) {
            $exists = true;
        }
        return $exists;
    }
    
    //checks if the passed ID exists this function is not dependent on the instance of the gateway object. This funciton is compatible to any table that has the ID as the primary key(unique)
    //$id = the id value that will be used in the sQL where clause
    //$table = the name of the table where the id value will be looked for
    //$colName = the name of the column where the id value will be looked against
    public function IDExistsExplicit($id,$table,$colName){
        $exists = false;
        $sql = "SELECT ".$colName." FROM ".$table." WHERE ".$colName."='".$id."'";
        $result = DatabaseHelper::runQuery($this->connection, $sql, null);
        $row = $result->fetch(); //this should only pick up one row since ID is uniquely identified( ID value passed in is from a primary key)
        if($row){
            $exists = true;
        }
        return $exists;
    }
    
     public function displayContinentPanelList(){
                $sql = "SELECT ContinentName, ContinentCode
                    FROM Continents
                    ORDER BY 1 ASC";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            while($row = $statement->fetch()){
               echo "<li class='list-group-item'><a href='browse-images.php?Continent=".$row['ContinentCode']."'>".$row['ContinentName']."</a></li>"; 
            }
        }
        
        
     public function displayCountriesPanelList(){
            $sql = "SELECT CountryName, ISO 
                    FROM Countries
                    INNER JOIN ImageDetails
                    ON ImageDetails.CountryCodeISO = Countries.ISO
                    GROUP BY 1
                    ORDER BY 1 ASC";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            while($row = $statement->fetch()){
              echo "<li class='list-group-item'><a href='browse-images.php?Country=".$row['ISO']."'>".$row['CountryName']."</a></li>"; 
            }
        }

    
    public function printRelatedImages($id){
                  $sql = "SELECT ImageID, Title, Path
                        FROM ImageDetails
                        WHERE ". $this->getForeignKey() ."=:id
                        ORDER BY 1 ASC";
                $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
                while($row = $statement->fetch()){
                     $this->printSmallImage($row['Path'],$row['Title'],$row['ImageID']);
                } 
                $this->closeDB();
    }
                
                
    public function printSmallImage($path,$title,$id) {
         echo "<a href='single-image.php?id=$id' class='preview' title='$title'><img id='demo' src='images/square-small/$path' title='$title' alt='$title' class='img-thumbnail' /></a>";

    }
    public function printResultsInTable() {
    $page = $this->getPageName();
    $results = $this->findAllSorted(true);
    $idName = $this->getPrimaryKeyName();
    $label = $this->getLabel();
    $counter = 0; //ensures that there are only 4 links per row
    foreach($results as $row)
    {
        if($counter == 0){
            echo "<tr>";
        }
        if($counter == 4){
            echo "</tr>";
            $counter = 0;
        }
        echo "<td class='removeBorder'><a href=".$page.$row[$idName].">".$row[$label]."</a></td>"; 
        $counter++;
    }
    $this->closeDB();
    }
    
   public function closeDB(){
        $this->connection = null;
    }
}





























?>