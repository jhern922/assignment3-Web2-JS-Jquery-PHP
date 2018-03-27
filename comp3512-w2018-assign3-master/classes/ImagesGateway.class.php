<?php
class ImagesGateway extends TableDataGateway {
    
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT *, ImageDetails.Title As ImageTitle, ImageDetails.Description AS descrip 
        FROM ImageDetails
        INNER JOIN Countries ON ImageDetails.CountryCodeISO = Countries.ISO
        INNER JOIN Cities ON ImageDetails.CityCode = Cities.CityCode
        INNER JOIN Users ON ImageDetails.UserID = Users.UserID";
    }
    
    protected function getOrderFields() {
        return 'ImageTitle';
    }
    
    protected function getPrimaryKeyName() {
        return "ImageID";
    }
    
    protected function getForeignKey() {
        return "ImageID";
    }
    
    protected function getPageName() {
        return "single-image.php?id=";
    }
    
    protected function getLabel() {
        return "ImageTitle";
    }
    

    //there would be no default value in this switch statement because the headers would take care of the error handling first before the program reaches this area of the code
    public function formSQLQuery($filterType,$id){
    switch($filterType){
        case 'All':             $sql = "SELECT ImageID, Title, Path
                                FROM ImageDetails
                                ORDER BY 1 ASC";
                                break;
        case 'Continent':       $sql = "SELECT ImageID, Title, Path, ContinentName
                                FROM ImageDetails
                                INNER JOIN Continents
                                ON Continents.ContinentCode = ImageDetails.ContinentCode
                                WHERE ImageDetails.ContinentCode='$id'
                                ORDER BY 1 ASC";
                                break;
        case 'Country':         $sql = "SELECT ImageID, Title, Path, CountryName
                                FROM ImageDetails
                                INNER JOIN Countries
                                ON Countries.ISO = ImageDetails.CountryCodeISO
                                WHERE ImageDetails.CountryCodeISO='$id'
                                ORDER BY 1 ASC";
                                break;
        case 'City':            $sql = "SELECT ImageID, Title, Path, AsciiName
                                FROM ImageDetails
                                INNER JOIN Cities
                                ON Cities.CityCode = ImageDetails.CityCode
                                WHERE ImageDetails.CityCode='$id'
                                ORDER BY 1 ASC";
                                break;
        case 'Text':            $sql = "SELECT ImageID, Title, Path
                                FROM ImageDetails
                                WHERE ImageDetails.Title LIKE '%$id%'
                                ORDER BY 1 ASC";
                                break;
        case 'ContinentName':   $sql = "SELECT * 
                                FROM Continents
                                WHERE ContinentCode='$id'";
                                break;
        case 'ContinentList':   $sql = "SELECT * 
                                FROM Continents";
                                break;
        case 'CountryList':     $sql = "SELECT *
                                FROM Countries
                                INNER JOIN ImageDetails
                                ON Countries.ISO =ImageDetails.CountryCodeISO
                                GROUP BY Countries.CountryName
                                ORDER BY Countries.CountryName";
                                break;
        case 'CityList':        $sql = "SELECT *
                                FROM Cities
                                INNER JOIN ImageDetails
                                ON Cities.CityCode =ImageDetails.CityCode
                                GROUP BY Cities.AsciiName
                                ORDER BY Cities.AsciiName";
                                break;
    }
    return $sql;
    }
}
?>