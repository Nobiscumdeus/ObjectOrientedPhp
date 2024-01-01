
<?php


//Making Connection to our PHP Database 
class Database
{
    //By using private, we don't want external access to these variables 
    private $host='localhost';
    private $user='root';
    private $password="";
    private $database="simple_cms";
//Protected allows the variable be accessible in the class, but not outside of it.
    protected $conn; 

    public function __construct()
    {
        $this->conn=new mysqli($this->host,$this->user,$this->password,$this->database);

        if($this->conn->connect_error)
        {
            die("Connection failed: ".$this->connect_error);
        }
    }
}




