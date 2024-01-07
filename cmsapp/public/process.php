
<?php  
session_start(); 

require_once('../classes/User.php');
require_once('../classes/Article.php');

$user=new User();
$article=new Article();

//Check which form was submitted 
if(isset($_POST['register']))
{
    //User registration form submitted 
    $regUsername=$_POST['regUsername'];
    $regPassword=$_POST['regPassword'];

    //Register the User 
    $user->register($regUsername,$regPassword);
    echo "Registration Successful";
}
elseif(isset($_POST['login']))
{
    //User login form was submitted 
    $loginUsername=$_POST['loginUsername'];
    $loginPassword=$_POST['loginPassword'];

    //Perform the User Login 
    if($user->login($loginUsername,$loginPassword))
    {
        
       //Get User Details 
       $userDetails=$user->getUserDetails($loginUsername);

       //Store User Details in a Session 
       $_SESSION['userdetails']=$userDetails;
       //Redirect to the article page 
       header("location:article.php");
    }else{
        echo "Login Failed. Please check your username and password";
        exit();
    }
}
elseif(isset($_POST['createArticle']))
{
    //Article Creation frorm submitted
    $articleTitle=$_POST['articleTitle'];
    $articleContent=$_POST['articleContent'];
    $articleUsername=$_POST['loginUsername']; //Assuming this is the login username 


    //Create the article
    $article->createArticle($articleTitle,$articleContent,$articleUsername);
    echo "Article created successfully";
}