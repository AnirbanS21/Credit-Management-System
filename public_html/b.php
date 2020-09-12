<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Credits</title>
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
        
        .imp {
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10%;
        }
        .note {
            padding-left: 10%;
            padding-right: 10%;
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
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            
        }
        .hyper{
            cursor:pointer;
            color:blue;
            text-decoration:underline;
        }
        span {
            cursor:pointer;
            color:blue;
            text-decoration:underline;
        }
    
        </style>
</head>
<body>
    <div class="topnav">
        <c>Credit Manager</c>
        <a onclick="location.href='a.html'">Home</a>
        <a href="#transfercredit">Transfer Credit</a>
        <a onclick="location.href='about.html'">About</a>
    </div>
    <div class="imp">
        <table>
            <tr>
                <th>Id</th>
                <th>User name</th>
                <th>Credits</th>
              </tr>
              <tr>
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

                if ($result-> num_rows >0) {
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>". $row["sr_no"] ."</td>
                                  <td class='hyper'onclick=location.href='c.php?sr_no=". $row["sr_no"] ."'>". $row["name"] ."</td>
                                  <td>". $row["credits"] ."</td>
                              </tr>";
                    }
                    echo "</table>";    
                }
                else {
                    echo "0 result";
                }
                $conn->close();
                ?>
              </tr>
        </table>
    </div>
    <div class="note">Tip: Click on one the given names to select the Sender</div>
</body>
</html>