
<?php


require_once('db.php');
class User extends Database{
    public function register($username,$password)
    {
        $hashedPaswwrod=password_hash($password,PASSWORD_DEFAULT);
        $query="INSERT INTO users(username,password) VALUES('$username','$hashedPaswwrod')";
        $this->conn->query($query); //The Connection variable in the database runs the query
    }
    
    public function getUserRecordFromDB($username)
    {
        //Prepare a SQL Statement to retrieve user record 
        $stmt=$this->conn->prepare("SELECT * FROM users WHERE username=? ");

        //Bind the parameter 
        $stmt->bind_param('s',$username);

        //Execute the query 
        $stmt->execute();

        //Get the result 
        $result=$stmt->get_result(); 
        //Fetch the user record as an associative array 
        $userRecord=$result->fetch_assoc();

        //Close the Statement 
        $stmt->close();

        //Return the user record or null if the user is not found 
        return $userRecord ? $userRecord:null; 

      

    }
    //Verify the entered password against the hashed password 
    public function verifyPassword($enteredPassword,$hashedPassword)
    {
        return password_verify($enteredPassword,$hashedPassword);

    }

    public function login($username,$enteredPassword)
    {
        //Step 1: Retrieve the user Record from the database based on the username provided 
        $userRecord=$this->getUserRecordFromDB($username);
        //Check if the user exists and the entered password 
        if($userRecord && $this->verifyPassword($enteredPassword,$userRecord['password']))
        {
            //Password Match, Login Successful 
            return true;
        }else{
            //Password do not match , return false 
            return false;

        }

       
    }
    public function getUserDetails($username)
    {
        return "User : $username";
    }
    
}