<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if ($_POST['username']=='bodhan' && $_POST['password']=='bodhan') {
        echo"login successful";
    }else{
        $error="login incorrect";
    }
}
?>
<?php require 'practisestd/header.php'; ?>
<div class="login-welcome">
    <h1>Student Management System</h1>
</div>
<h2>Login</h2>
<?php if(!empty($error)):?>
    <p><?= $error?></p>
    <?php endif;?>
<form action="" method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </div>
    <button>Log In</button>
</form>    
<?php require 'practisestd/footer.php';?>