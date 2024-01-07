<?php
session_start();
require_once('../classes/Article.php');
$article=new Article();
$articles=$article->getArticles();
if(isset($_SESSION['userdetails']))
{
    $userDetails=$_SESSION['userdetails'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles </title>
</head>
<body>
    <!----- Article Creation -->
    <h2> Article Creation </h2>
    <form action="process.php" method="POST">'
        <label for="articleTitle"> Title: </label>
        <input type="text" id="articleTitle" name="articleTitle" required />
        <br>
        <label for="articleContent"> Content: </label>
        <textarea id="articleContent" name="articleContent" rows="4" required />
        <br>
        <!--- Assuming login form username is used -->
        <input type="hidden" name="loginUsername" value="sample_user">
        <button type="submit" name="createArticle"> Create Article </button>
        
    </form>


    <!----- Displaying Articles -->
    <h2>Articles</h2>
    <?php echo 'Welcome '.$userDetails ?>
 
   
   <?php

    foreach($articles as $article){
        /** echo "<h3> {$article['title']}</h3>"
        echo "<h3> {$article['content']}</h3>"
        echo "<hr>"*/
        echo $article['title'];
        echo $article['content'];
        
    }
   
    ?>

 

</body>
</html>