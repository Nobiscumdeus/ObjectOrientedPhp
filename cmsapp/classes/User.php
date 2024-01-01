
<?php


require_once('db.php');
class User extends Database{
    public function register($username,$password)
    {
        $hashedPaswwrod=passwprd_has($password,PASSWORD_DEFAULT);
        $query="INSERT INTO users(username,password) VALUES('$username','$hashedPaswwrod')";
        $this->conn->query($query); //The Connection variable in the database runs the query
    }

    public function login($username,$password)
    {
        $query="SELECT * FROM users WHERE username='$username'";
        $result=$this->conn->query($query);

        if($result->num_rows==1)
        {
            $user=$result->fetch_assoc();
            if(password_verify($password,$user['password']))
            {
                return true;
            }
        }
        return false;
    }
}