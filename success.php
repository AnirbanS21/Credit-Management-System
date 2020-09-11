<?php

    echo "Success";
    $conn =mysqli_connect("localhost","root","root","credit_storage");
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

    sleep(2);
    header('Location: b.php');
?>