<?php
require './includes/config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    //  negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    //  check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    //  check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from  account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount  to account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Banking System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="table.css">
	</head>
	<body>
    <?php
			require './includes/header.php';
		?>
		<div id="banner-image">
        <br>
        <h1>Transfer Money</h1>
        <br>
        <br>
        
    <?php
			require './includes/config.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM  users where id=$sid";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows=mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext" ><br>
    <div>
        <table class="table table-striped table-condensed table-bordered">
            <tr style="color : black;">
                <th class="text-center">Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Balance</th>
            </tr>
            <tr style="color : black;">
                <td class="py-2"><?php echo $rows['id'] ?></td>
                <td class="py-2"><?php echo $rows['name'] ?></td>
                <td class="py-2"><?php echo $rows['email'] ?></td>
                <td class="py-2"><?php echo $rows['balance'] ?></td>
            </tr>
        </table>
    </div>
    <br><br><br>
    <label style="color : black;"><b>Transfer To:</b></label>
    <select name="to" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
            require './includes/config.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM users where id!=$sid";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error ".$sql."<br>".mysqli_error($conn);
            }
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
            <option class="table" value="<?php echo $rows['id'];?>" >
            
                <?php echo $rows['name'] ;?> (Balance: 
                <?php echo $rows['balance'] ;?> ) 
           
            </option>
        <?php 
            } 
        ?>
        <div>
    </select>
    <br>
    <br>
        <label style="color : black;"><b>Amount:</b></label>
        <input type="number" class="form-control" name="amount" required>   
        <br><br>
            <div class="text-center" >
        <button class="btn btn-danger" name="submit" type="submit" id="myBtn" >Transfer</button>
        </div>
    </form>
</div>
      	<?php
			require './includes/footer.php';
		?>
        </div>
	</body>
</html>