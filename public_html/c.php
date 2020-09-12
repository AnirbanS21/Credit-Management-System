<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trasnfer Credit Details</title>
    <style>
        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }
        
        .topnav {
          overflow: hidden;
          background-color: rgb(89, 89, 89);
        }
        
        .topnav a, c {
          float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 20px 16px;
          text-decoration: none;
          font-size: 30px;
          
        }
        .topnav a {
            font-size: 20px;
            text-align: center;
            padding: 30px 16px;
        }
        
        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }
        
        .topnav a.active {
          background-color: #4CAF50;
          color: white;
        }
        /*.CreditManager :hover{
            background-color: #f2f2f2;
            color: black;
        }*/
        .imp, .imp1{
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10%;
        }
        .hello {
            font-size: 55px;
        }
        .transfer {
            font-size: 30px;
        }
        .takemethere {
            position: relative;
            padding: 10px;
            font-size: 25px;
            background-color: dodgerblue;
            border-radius: 5px;
            border-color: dodgerblue;
        }
        </style>
</head>
<body>
    <div class="topnav">
        <c>Credit Manager</c>
        <a onclick="location.href='a.html'">Home</a>
        <a onclick="location.href='b.php'">Transfer Credit</a>
        <a onclick="location.href='about.html'">About</a>
    </div>
    <div class="imp1">
        <form action="success.php">
            <label for="receivers">Choose a recipient:</label>
                <select id="receiver" name="receiver">
                    <option selected disabled>--select--</option>
                    <?php
                    $hostname = "localhost";
                    $username = "id14836882_root";
                    $password = "Aj7u&V7Lfdd.MGX";
                    $database = "id14836882_credit_storage";
                    $conn =mysqli_connect($hostname, $username, $password, $database);
                    if($conn-> connect_error) {
                    die("connection failed:". $conn-> connect_error);
                    }
                    $sql = "Select sr_no, name, credits from owners";
                    $result = $conn-> query($sql);
                    $sr_no= intval($_GET['sr_no']);
                    $limit=0;
                    if ($result-> num_rows >0) {
                        while ($row = $result-> fetch_assoc()) {
                            if ($sr_no != $row["sr_no"]) {
                                echo "<option value=". $row["sr_no"] .">". $row["name"] ."</option>";
                            }
                            else {
                                $limit= $row["credits"];
                                
                            }
                            
                        }  
                    }
                    else {
                        echo "0 result";
                    }
                    //$conn->close();
                    ?>
                </select>
                <div>
                    <a>Limit:
                    <input type = "number" id="limit" name="limit" min="0" max=
                        <?php
                            echo $limit ;
                        ?>
                    >
                    <?php
                            echo "(Max: ".$limit.")" ;
                    ?>
                    </a>

                </div>
                <input type="hidden" id="sender" name="sender" value=<?php echo"$sr_no"?>>

                <input type="submit" name="submit">
        </form>
        
                
    </div>
    
</body>
</html>
