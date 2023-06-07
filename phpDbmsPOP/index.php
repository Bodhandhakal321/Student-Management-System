<?php
require 'includes/database.php'; 
require 'includes/auth.php';
// require is more secure than include
session_start();
$conn= getDB();
$sql= "select * from article;";
$result = mysqli_query($conn, $sql);
if($result===false){
    echo mysqli_error($conn);
}
else{
    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php require 'includes/header.php';?>
<?php if (isLoggedIn()):?>
    <p>You are Logged in. <a href="logout.php">Log Out</a></p>
<a href="newArticle1.php">Code from new article</a>
<?php else:?>
    <p>You are not logged in. <a href="login.php">Log in</a></p>
    <?php endif;?>
    <?php if(empty($articles)):?>
    <p>No articles found</p>
    <?php else:?>
    <ul>
        <?php foreach($articles as $article):?>
            <li>
                <article>
                    <h2>
                        <a href="article.php?id=<?=$article['id'];?>">
                        <?=$article['title'];?>
                        </a>
                    </h2>
                    <p><?=$article['content'];?></p>
                </article>
            </li>
            <?php endforeach;?>
    </ul>
<?php endif;?>       
<?php require 'includes/footer.php';?>