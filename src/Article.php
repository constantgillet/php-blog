<?php

class Article {

    //Database connection and table
    private $conn;
    private $table_name = 'articles';

    //Properies of the object
    public $id;
    public $title;
    public $illustration;
    public $creation_date;
    public $category;
    public $content;

    // constructor with $db as database connection
    public function __construct($pdo){
        $this->conn = $pdo;
    }

    //Function to get the data from the id
    function get_data() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $article_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->title = $article_data['title'];
        $this->illustration = $article_data['illustration'];
        $this->creation_date = $article_data['creation_date'];
        $this->category = $article_data['category'];
        $this->content = $article_data['content'];
    }

    //Function to add an article in the db
    function create() {

        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, illustration=:illustration, creation_date=:creation_date, category=:category, content=:content";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':illustration', $this->illustration);
        $stmt->bindParam(':creation_date', $this->creation_date);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':content', $this->content);

        // execute query
        if($stmt->execute()){

            return true;
        }
    
        return false;
    }
}