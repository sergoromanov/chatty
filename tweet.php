<?php
session_start();
$userId = $_SESSION['userId'];
$con=mysqli_connect('localhost','root','root','social');
$query=mysqli_query($con, "INSERT INTO post (text,img,name) VALUES ('" .$_POST['text']."' , 'img/" .$_FILES['img']['name']."' , '" .$_POST['nick']."' )");
move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$_FILES['img']['name']);
header('Location:main.php?id='.$_POST['id']);
 ?>