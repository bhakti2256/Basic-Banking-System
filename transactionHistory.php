<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-customer">
        <div class="logo" id="homePage">
        <p class="noselect" style="cursor: pointer;">TSF Bank</p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php">Home</a></li>
                <li><a href="customers.php">View Customers</a></li>
            </ul>
        </div>
    </nav>
    <h1>Transaction History</h1>
    <div >
        <table class="main-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $server = "sql206.epizy.com";
                $username = "epiz_29156711";
                $password = "yPj2MNUsAGr";
                $db = "epiz_29156711_tsfbanksystem";

                //to establish connection
                $con = mysqli_connect($server, $username, $password,$db);

                //to check
                if(!$con){
                    die("Connection to this database failed due to " . mysqli_connect_error());
                }
                // else{
                //     echo "Coonnection successful";
                // }

                $selectquery = "select * from transaction";
                $query = mysqli_query($con, $selectquery);
                $rownum = mysqli_num_rows($query);

                while($res = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $res['ID'] ?></td>
                        <td><?php echo $res['Sender'] ?></td>
                        <td><?php echo $res['Receiver'] ?></td>
                        <td><?php echo $res['Amount'] ?></td>
                        <td><?php echo $res['Date and Time'] ?></td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>