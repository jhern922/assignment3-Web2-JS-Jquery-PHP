<?php
class CountriesGateway extends TableDataGateway {
    
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT ISO, CountryName, Capital, Area, Population, CurrencyName, CountryDescription, Longitude, Latitude 
        FROM Countries 
        INNER JOIN ImageDetails ON ImageDetails.CountryCodeISO = Countries.ISO ";
    }
    
    protected function getOrderFields() {
        return 'CountryName';
    }
    
    protected function getPrimaryKeyName() {
        return "ISO";
    }
    
    protected function getForeignKey() {
        return "CountryCodeISO";
    }
    
    protected function getPageName() {
        return "single-country.php?id=";
    }
    
    protected function getLabel() {
        return "CountryName";
    }
}
?>