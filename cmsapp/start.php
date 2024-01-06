<?php


$servername="localhost";
$username="root";
$password="";
$dbname="cmsapp";

//Create Connection 
$conn=new mysqli($servername,$username,$password);

//Check Connection 
if($conn->connect_error)
{
    die("Connection failed".$conn->connect_error);

}
//Create the Database 
$sql="CREATE DATABASE IF NOT EXISTS $dbname ";
if($conn->query($sql)===TRUE){
    echo "Database created successfully\n";
}else{
    echo "Error creating databases";
}

//Select the created database
$conn->select_db($dbname);
//Create the users table 
$sql="CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY  KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";
    if($conn->query($sql)===TRUE){
        echo "Users table created successfully";
    }else{
        echo "Error creating users table: ".$conn->error. "\n";

    }
    //Create articles table 
    $sql="CREATE TABLE IF NOT EXISTS articles(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        user_id INT NOT NULL,
        FOREIGN KEY(user_id) REFERENCES users(id)
                )";

if($conn->query($sql)===TRUE){
    echo "Articles table created successfully";
}else{
    echo "Error creating articles table".$conn->error."\n";
}

//Close Connection 
$conn->close();

?>
