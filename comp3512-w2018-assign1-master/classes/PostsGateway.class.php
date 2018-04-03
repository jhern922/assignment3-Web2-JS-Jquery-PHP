<?php
class PostsGateway extends TableDataGateway {
    
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT Posts.PostID, ImageDetails.Title AS MainImageTitle, MainPostImage, Posts.UserID, CONCAT(Users.FirstName,' ',Users.LastName) AS FullName, Posts.Title, Posts.Message, PostTime, ImageDetails.Path
        FROM Posts 
        INNER JOIN PostImages ON  PostImages.PostID = Posts.PostID
        INNER JOIN ImageDetails ON PostImages.ImageID = ImageDetails.ImageID
        AND ImageDetails.ImageID = Posts.MainPostImage
        INNER JOIN Users ON Users.UserID = Posts.UserID";
    }
    
    protected function getOrderFields() {
        return 'PostTime';
    }
    
    protected function getPrimaryKeyName() {
        return "Posts.PostID";
    }
    
    protected function getForeignKey() {
        return "Posts.PostID";
    }
    
    protected function getPageName() {
        return "single-post.php?id=";
    }
    
    protected function getLabel() {
        return "Title";
    }
    
    public function getRelatedPostImages($id){
        $sql = 'SELECT Posts.PostID, ImageDetails.ImageID, ImageDetails.Path, ImageDetails.Title
        FROM Posts 
        INNER JOIN PostImages ON  PostImages.PostID = Posts.PostID
        INNER JOIN ImageDetails ON PostImages.ImageID = ImageDetails.ImageID
        WHERE Posts.PostID='.$id. '
        AND ImageDetails.ImageID <> Posts.MainPostImage';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll();
    }
}
?>