<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="./css/transaction.css">
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-customer">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect" style="cursor: pointer;">TSF Bank</p>
        </div>
        <div>
            <ul class="item">
                <li><a href="index.php">Home</a></li>
                <li><a href="transactionHistory.php">Transaction history</a></li>
            </ul>
        </div>
    </nav>
    <div class="mainSection">
        <h2>Transaction details</h2>
        <form action="" method="post">

            <?php 
            global $sender;
            $customerId = $_GET['id'];
            $selectquery = "SELECT * FROM customers WHERE ID = '$customerId'";
            $showdata = mysqli_query($con, $selectquery);
            if($bool = mysqli_fetch_array($showdata)){
                // echo $bool['Name'];
                $money = $bool['Current_Balance'];
                $sender = $bool['Name'];
            }
            ?>
        <table class="table">
            <tr>
                <td>
                    <p class="form-field">Transfer from:</p>
                </td>
                <td>
                <?php echo $sender . '(' . $bool['Current_Balance'] . ')'; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="form-field">Transfer to: </p>
                </td>
                <td>
                    <select name="customers" id="customerlist" class="input">
                        
                        <?php 
                        $selectquery = "SELECT Name,Current_Balance FROM customers WHERE NOT ID = '$customerId'";
                        $showdata = mysqli_query($con, $selectquery);
                        
                        while($transferTo = mysqli_fetch_array($showdata)){
                            ?>
                        <option value="<?php echo $transferTo['Name']; ?>" ><?php echo $transferTo['Name'] . '(' . $transferTo['Current_Balance'] . ')'; ?></option>
                        <?php
                        }
                        global $getMax;
                        $getMaxQuery = mysqli_query($con, "SELECT `Current_Balance` FROM `customers` WHERE `Name` = '$receiver'");
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="form-field">Enter amount: </p>
                </td>
                <td>
                    <input type="number" name="amount" id="amt" placeholder="Enter amount" class="input" required min="1" max=<?php echo "$money"; ?>>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn"> Transfer</button>
        
        </form>
        <?php
            global $update;
            global $receiver;
            if(!empty($_POST['amount'])){
                $transfer = $_POST['amount'];
                // $add = $_POST['amount'];
                $amount = $money - $transfer;
                $receiver = $_POST['customers'];
                //get money
                $getMoneyQuery = "SELECT `Current_Balance` FROM `customers` WHERE `Name` = '$receiver'";
                $getMoney = mysqli_query($con, $getMoneyQuery);
                // echo $getMoneyQuery;
                // echo $getMoney;
                if($amt = mysqli_fetch_array($getMoney)){
                    // echo $amt[0];
                    $addmoney = $amt[0] + $transfer; 
                }

                // echo $addmoney;
                $updatequery = "UPDATE `customers` SET `Current_Balance` = '$amount' WHERE `ID` = '$customerId'";
                $update = mysqli_query($con, $updatequery);
                
                $updateToQuery = "UPDATE `customers` SET `Current_Balance` = '$addmoney' WHERE `Name` = '$receiver'";
                $updateTo = mysqli_query($con, $updateToQuery);

                $TransactionHistoryQuery = "INSERT INTO `transaction` (`Sender`, `Receiver`, `Amount`, `Date and Time`) VALUES ('$sender','$receiver','$transfer', current_timestamp());";
                $TransactionHistory = mysqli_query($con, $TransactionHistoryQuery);
            }
            if($update){
        ?>      
                <script type="text/javascript">
                    alert("Transaction Successful");
                    window.location.href = "transactionHistory.php";
                </script>
            <?php } ?>

    </div>
    <script>
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>
