<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trasnfer Credit Details</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,500&display-swap');
    /** {*/
    /*    box-sizing: border-box;*/
    /*}*/
        body {
          margin: 0;
          font-family: 'Open Sans', sans-serif;
          align-items:center;
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
        .imp{
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10%;
        }
        div.imp1{
          
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
        
        .imp1 {
            
            text-align:center;
            margin: auto;
            width: 400px;
            max-width:100%;
            background-color: #eee;
            border-radius:5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            width:500px;
            max-width:100%;
            overflow: hidden;
            padding-bottom:30px;
        }
        h2 {
            background-color: #f7f7f7;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 40px;
            margin 0;
        }
        .info {
            font-style: bold;
            font-size: 22px;
            padding-bottom: 30px;
        }
        form {
            margin-bottom: 10px;
            position: relative;
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
    <div style="height:50px"></div>
    <div class="imp1">
        <h2>Transfer Credits</h2>
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
        $mail="";
        $mail_sql ="SELECT * from owners WHERE sr_no=".$sr_no;
        $mail_result = $conn-> query($mail_sql);
        $mail = $mail_result-> fetch_assoc();

        
      ?>

        <form action="success.php">
            <div class="info">Name of sender: 
                <?php
                 echo $mail["name"];
                ?>
                <br>
                E-mail ID: 
                <?php
                 echo $mail["mail"];
                ?>
                <br>
                Credits: 
                <?php
                 echo $mail["credits"];
                ?>
                
            </div>
            <label for="receivers">Choose a recipient:</label>
                <select id="receiver" name="receiver">
                    <option selected disabled>--select--</option>
                    <?php
                    
                    
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
                    <a>Transfer Amount:
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
