<?php 

class Queries{
    public function readSingle($email, $pass) :string {
    
        require '../connections/connection.php';

        $sql = 'SELECT * FROM users WHERE email=:email AND password=:pass';

        $statement = $connection->prepare($sql);
        $statement->execute([':email' => $email, ':pass' => $pass]);

        $user = $statement->fetch(PDO::FETCH_OBJ);

        if (!$user) {
            return 'Login failed.';
        } else {   
            session_start();
            $_SESSION["user_id"] = $user->user_id;
            $_SESSION["name"] = $user->name;
            header("Location: home.php");
            exit;
        }
    
}
public function getPosts(): array {

    require '../connections/connection.php';
    
    $sql = "SELECT * FROM posts";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $posts = $statement->fetchAll(PDO::FETCH_OBJ);
    
    return $posts;
    }

    public function createPost($title, $body, $user_id) {
        require 'connection.php';

        $sql = 'INSERT INTO posts(title, body, user_id) VALUES (:title, :body, :user_id)';
        $statement = $connection->prepare($sql);

        $statement->execute([':title' => $title, ':body' => $body, ':user_id' => $user_id]);

        header("Location: home.php");
        exit;
    }
    

}

?>