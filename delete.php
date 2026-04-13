<?php
include 'db.php';
if (isset($_GET["bookid"])) {
    $id=$_GET["bookid"];
    $sql=$conn->prepare("delete from book where book_id=?");
    $sql->bind_param("i",$id);
    $sql->execute();
    header("Location:dash.php");
   
}
?>