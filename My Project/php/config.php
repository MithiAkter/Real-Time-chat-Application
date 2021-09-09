<?php
$conn = mysqli_connect("localhost","root","","chat");
if(!$conn){
    echo "Database Connected!" .  mysqli_connect_error();
}


?>