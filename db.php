<?php

    $conn = mysqli_connect("localhost", "root", "", "bundus_plug");

    if(!$conn){
        echo "<h3 class='container my-3 text-center bg-dark text-white rounded-lg p-3'>Unable to establish connection to Database</h3>";
    }

?>
