<?php

require_once('db.php');


class Article extends Database
{
    public function createArticle($title,$content,$username)
    {
        $userId=$this->getUserIdByusername($username);
        $query="INSERT into articles(title,content,user_id) VALUES('$title','$content','$userId')";
        $this->conn->query($query);


    }
    public function getArticles()
    {
        $query="SELECT * FROM articles";
        $result=$this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    private function getUserIdByUsername($username)
    {
        $query="SELECT id From users WHERE username='$username'";
        $result=$this->conn->query($query);

        if($result->num_rows==1)
        {
            $user=$result->fetch_assoc();
            return $user['id'];
        }
        return null;
    }
}
