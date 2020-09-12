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
          cursor: pointer;
          transition: 0.5s;
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
        div.imp1{
          text-align:center;
          margin: auto;
          width: 50%;
          padding-top: 10%;
        }
        @media screen and (min-width: 601px) {
          div.imp1 {
            width: 50%;
          }
        }
        
        @media screen and (max-width: 600px) {
          div.imp1 {
            width: 38%;
          }
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
         @media screen and (min-width: 601px) {
          .topnav a.navbutton {
            font-size: 20px;
            padding: 30px 16px;
          }
        }
        
        @media screen and (max-width: 600px) {
          .topnav a.navbutton {
            font-size: 15px;
            padding: 20px 6px;
          }
        }
        .topnav a.active {
          background-color: #4CAF50;
          color: white;
        }
        /*.CreditManager :hover{
            background-color: #f2f2f2;
            color: black;
        }*/
        .imp {
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10%;
        }
        
        .hello {
            font-size: 55px;
        }
        @media screen and (min-width: 601px) {
          a.hello {
            font-size: 55px;
          }
        }
        
        @media screen and (max-width: 600px) {
          a.hello {
            font-size: 35px;
          }
        }
        .transfer {
            font-size: 30px;
        }
        @media screen and (min-width: 601px) {
          a.transfer {
            font-size: 30px;
          }
        }
        
        @media screen and (max-width: 600px) {
          a.transfer {
            font-size: 20px;
          }
        }
        input.takemethere {
            position: relative;
            padding: 10px;
            font-size: 25px;
            background-color: dodgerblue;
            border-radius: 5px;
            border-color: dodgerblue;
        }
        @media screen and (min-width: 601px) {
          input.takemethere {
            font-size: 25px;
            padding: 10px;
          }
        }
        
        @media screen and (max-width: 600px) {
          input.takemethere {
            font-size: 15px;
            padding: 7px;
          }
        }
        @media screen and (min-width: 601px) {
          .topnav c.credits {
            font-size: 30px;
            padding: 20px 16px;
          }
        }
        
        @media screen and (max-width: 600px) {
          .topnav c.credits {
            font-size: 20px;
            padding: 15px 11px;
          }
        }
        .limit{
          padding:10px;
        }
        
        </style>
</head>
<body>
    <div class="topnav">
        <c class="credits">Credit Manager</c>
        <a class="navbutton" onclick="location.href='a.html'">Home</a>
        <a class="navbutton" onclick="location.href='b.php'">Transfer Credit</a>
        <a class="navbutton" onclick="location.href='about.html'">About</a>
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
                <div class="limit">
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

                <input class="takemethere" type="submit" name="submit">
        </form>
       
                
    </div>
    
</body>
</html>
