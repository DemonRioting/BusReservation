<?php
    
    $con = mysqli_connect('localhost','root','12345' ,'demo');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>