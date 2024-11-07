<?php
    define("HOSTNAME","localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "tournament");

    $connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

    if(!$connection){
        die("OFFLINE");
    }
    else{
        echo "ONLINE";
    }
?>