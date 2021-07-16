<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar">
        <div class="logo" id="homePage">
            <!-- logo -->
            <p class="noselect" style="cursor: pointer;">TSF Bank</p>
        </div>
        <div>
            <ul class="item">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="customers.php">View all customers</a></li>
                <li><a href="transactionHistory.php">Transaction history</a></li>
            </ul>
        </div>
    </nav>
    <section class="main" id="home">
        <div class="content">
            <h1>Get & Send money at your fingertips</h1>
            <p>A bank management system where user can easily send money to his friends. User can also view the transction history and balance in his/her account. So enjoy seamless banking !</p>
            <button class="btn" id="customers">View Customers</button>
        </div>
        <div class="image">

        </div>
    </section>
    <section id="services">
        <h3>Services</h3>
        <div class="card">
            <div class="card_content">
                <img src="./images/customers.png" alt="">
                <button id="customersPage" class="btn">View Customers</button>
            </div>
            <div class="card_content">
                <img src="./images/transaction-history.png" alt="">
                <button class="btn" id="transactionPage">See transaction history</button>
            </div>
        </div>
    </section>
    <footer> &copy; TSF Bank</footer>
    <script type="text/javascript">
        document.getElementById("customers").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("customersPage").onclick = function () {
            location.href = "customers.php";
        };
        document.getElementById("transactionPage").onclick = function () {
            location.href = "transactionHistory.php";
        };
        document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };
    </script>
</body>
</html>