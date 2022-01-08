<!DOCTYPE html>
<html>
	<head>
		<title>Banking System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			require './includes/header.php';
		?>
		<div id="banner-image">
        <br>
        <h1>Welcome to the sparks bank</h1>
        <br>
        <br>
      <!-- Activity section -->
            
      <div class="row activity text-center">
                  <div class="col-md-4 col-sm-6">
                    <img src="img/users.jpg" class="img-fluid">
                    <br>
                    <a href="transfermoney.php"><button style="background-color : #2785C4;">User Details</button></a>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <img src="img/transaction.jpg" class="img-fluid">
                    <br>
                    <a href="transfermoney.php"><button style="background-color : #2785C4;">Make a Transaction</button></a>
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <img src="img/historys.jpg" class="img-fluid">
                    <br>
                    <a href="transactionhistory.php"><button style="background-color : #2785C4;">Transaction History</button></a>
                  </div>
            </div>
      </div>
		<?php
			require './includes/footer.php';
		?>
        </div>
	</body>
</html>