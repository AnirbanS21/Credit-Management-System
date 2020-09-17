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
    $count=0;
    $check_sql ="SELECT COUNT(sr_no) FROM owners WHERE sr_no=". $receiver;
    $count= $conn->query($check_sql);
    // echo $count['count(sr_no)'];
    $cnt = $count-> fetch_assoc();
    if ($cnt['COUNT(sr_no)']>0)
    {
        
        $amt= intval($_GET['limit']);
        if ($amt=='')
        {
            header('Location: b.php?msg=3');
            exit(0);
        }
        $sql= "UPDATE owners SET credits=credits-$amt where sr_no=$sender";
        $result = $conn-> query($sql);
        $sql= "UPDATE owners SET credits=credits+$amt where sr_no=$receiver";
        $result = $conn-> query($sql);
        header('Location: b.php?msg=2');
        exit(0);
    }
    else
    {
        header('Location: b.php?msg=1');
        exit(0);
    }

    
?>