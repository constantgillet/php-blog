<?php

class User {

    //Database connection and table
    private $conn;
    private $table_name = 'users';

    //Properies of the object
    public $id;
    public $email;
    public $password;
    public $user_level;

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
        
        $this->email = $aemaile_data['email'];
        $this->password = $article_data['password'];
        $this->user_level = $article_data['user_level'];
    }

    //Login the user
    function login() {
        $query = "SELECT id, user_level FROM " . $this->table_name . " WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if($stmt->execute()) {
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC); 
            
            if(isset($user_data['id'])){
                
                //Start session and set infos
                $_SESSION['id'] = (int)$user_data['id'];
                $_SESSION['user_level'] = (int)$user_data['user_level'];
    
                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
}