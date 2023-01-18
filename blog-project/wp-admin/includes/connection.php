<?php

$database = mysqli_connect('localhost', 'root', '', 'blog_project');
if($database){
    // echo "Database Connected!";
}else{
    die("Database Connection Error!.mysqli_error"($database));
}

?>