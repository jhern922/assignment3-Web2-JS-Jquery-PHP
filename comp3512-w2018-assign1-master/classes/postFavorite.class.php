<?php
    class postFavorite {
        public $postTitle;
        public $postPath;
        
        public function __construct($title, $path) {
        $this->postTitle = $title;
        $this->postPath = $path;
    }
        public function getTitle(){
            return $this->postTitle;
        }
    }
?>