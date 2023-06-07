<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'includes/database.php';
    $conn=getDB();
    $sql="INSERT INTO
    article(title, content, published_at) VALUES(' ".$_POST['title']." ',' ".$_POST['content']." ',' ".$_POST['published_at']." ')";
    var_dump($sql);
    $result = mysqli_query($conn,$sql);
    if($result===false){
        echo mysqli_error($conn);
    }else{
        $id = mysqli_insert_id($conn);
        echo"Inserted record with id: $id";
    }
}
?>
<?php require 'includes/header.php';?>
<h2>New Article</h2>
<form method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Article title">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="40" rows="4" placeholder="Article content"></textarea>
    </div>
    <div>
        <label for="published_at">Published date and time</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>
    <button>Add</button>
</form>
<?php require 'includes/footer.php'; ?>