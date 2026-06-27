<?php

include 'db.php';

$id=$_GET['id'];

$sql=$conn->prepare("delete from courses where id=?");

$sql->bind_param("i",$id);

if($sql->execute()){

    header("location:view_courses.php");
    exit();

}else{

    echo "Data not deleted";
}

?>