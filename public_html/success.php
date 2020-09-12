<?php

    //echo "Success";
    $hostname = "localhost";
    $username = "id14836882_root";
    $password = "Aj7u&V7Lfdd.MGX";
    $database = "id14836882_credit_storage";
    $conn =mysqli_connect($hostname, $username, $password, $database);
    if($conn-> connect_error) {
        die("connection failed:". $conn-> connect_error);
    }
    $sender= intval($_GET['sender']);
    $receiver= intval($_GET['receiver']);
    $amt= intval($_GET['limit']);
    $sql= "UPDATE owners SET credits=credits-$amt where sr_no=$sender";
    $result = $conn-> query($sql);
    $sql= "UPDATE owners SET credits=credits+$amt where sr_no=$receiver";
    $result = $conn-> query($sql);
    $conn->close();

    //sleep(2);
    header('Location: b.php');
    exit(0);
?>