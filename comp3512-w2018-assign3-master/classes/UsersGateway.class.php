<?php
class UsersGateway extends TableDataGateway {
    
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT UserID, CONCAT(FirstName,' ',LastName) AS FullName, Address, City, Postal, Country, Phone, Email
                FROM Users ";
    }
    
    protected function getOrderFields() {
        return 'LastName';
    }
    
    protected function getPrimaryKeyName() {
        return "UserID";
    }
    
    protected function getForeignKey() {
        return "UserID";
    }
    
    protected function getPageName() {
        return "single-user.php?id=";
    }
    
    protected function getLabel() {
        return "FullName";
    }
}
?>