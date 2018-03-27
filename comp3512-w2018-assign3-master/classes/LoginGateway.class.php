<?php
class LoginGateway extends TableDataGateway {
    
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return  "SELECT Salt FROM UsersLogin ";
    }
    
    protected function getOrderFields() {
        return 'UserName';
    }
    
    protected function getPrimaryKeyName() {
        return "UserName";
    }
    
    protected function getForeignKey() {
        return "UserID";
    }
    
    protected function getPageName() {
        return "index.php";
    }
    
    protected function getLabel() {
        return "UserName";
    }
    
    public function passCheck($saltedPWD) {
        $test = false;
        $sql = "SELECT UserID, UserName FROM UsersLogin WHERE Password = '$saltedPWD'";
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        $row = $statement->fetch();
        if(isset($row['UserName'])) {
            $test = true;
            $userID = $row['UserID'];
        }
        
        return array($test,$userID);
    }
}
?>