<?php 
require "practisestd/Database.php";
$conn=getDB();
$id= $_GET['id']; //fetching values of id
$query = "DELETE FROM students where id='$id'";
$data = mysqli_query($conn,$query);
if($data){
    echo "<script>alert('data deleted successfully')</script> ";
    ?> 
     <meta http-equiv = "refresh" content = "0; url = http://localhost:3000/display.php" />
    <?php
}
else{
    echo "<script>alert('failed to delete')</script> ";
}
?>
