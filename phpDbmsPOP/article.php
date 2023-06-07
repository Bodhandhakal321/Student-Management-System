<?php
require 'includes/database.php';
require 'includes/article.php';
$conn=getDB();
if(isset($_GET['id'])){
    $article=getArticle($conn,$_GET['id']);
    $sql ="select * from article where id = ". $_GET['id'];
    $result=mysqli_query($conn,$sql);
    if($result===false){
        echo mysqli_error($conn);

    }else{
        $article=mysqli_fetch_assoc($result); 
        
    }
}
    else{
        $article=null;
    }

?>

<?php require 'includes/header.php'; ?>
        
            <?php if ($article===null):?>
                <p>No article found</p>
                <?php else : ?>
                    <article>
                        <h2><?= htmlspecialchars($article['title'])?></h2>
                        <p><?= htmlspecialchars($article['content'])?></p>
                        <p><?= htmlspecialchars($article['published_at'])?></p>
                </article>
                <a href="editArticle.php?id=<?= $article['id'];?>">Edit</a>
                <a href="delete.php?id=<?= $article['id'];?>">Delete</a>
                <?php endif ; ?>
                <!-- end curly braces -->
                <?php require 'includes/footer.php'; ?>
