<?php
	$con = mysqli_connect("localhost","root","","banking_system");
	$query = "select * from customer";
	$result = mysqli_query($con,$query);

 

    @$x = $_REQUEST['sender-account'];
    @$y = $_REQUEST['receiver-account'];
    @$z = $_POST['transfer-amount'];

    if ($x != $y) {
        $sql = "INSERT INTO `banking_system`.`history` (`SenderName`, `ReceiverName`, `Transfer`) VALUES ('$x', '$y', '$z')";
        $rs = mysqli_query($con, $sql);

        $increment = "UPDATE `banking_system`.`customer` SET `Balance` = `Balance` + $z WHERE `CustomerName` = '$y'";
        $decrement = "UPDATE `banking_system`.`customer` SET `Balance` = `Balance` - $z WHERE `CustomerName` = '$x'";


        $res_increment = mysqli_query($con, $increment);
        $res_decrement = mysqli_query($con, $decrement);
    }

    $select_Query = "select * from history";
    $res2 = "DELETE FROM history WHERE Transfer = 0";

    $res = mysqli_query($con, $select_Query); 
    $rs2 = mysqli_query($con, $res2);

    $select_customers = "select * from customer";
    $res3 = mysqli_query($con, $select_customers);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Banking System</title>
	<link rel="stylesheet" type="text/css" href="transfer.css">
</head>
<body>
	<header>
		<div class="logo">
			<img src="bank-logo.png" alt="Bank Logo">
		</div>
		<nav>
			<ul class="menu">
				<li><a href="index.php">HOME</a></li>
				<li><a href="customer.php">CUSTOMER</a></li>
				<li><a href="transfer.php">TRANSFER</a></li>
				<li><a href="history.php">HISTORY</a></li>
			</ul>
			<div class="burger">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
		</nav>
	</header>
	<main>
		<div class="transfer">
			<h1>Transfer Money</h1>
			<form action="transfer.php" method="post">

				<div class="sender">
					<label for="sender-account">Sender Name</label>
					<select name="sender-account" id="sender-account">
						<?php
							foreach ($res3 as $row) {
							echo "<option value = $row[CustomerName]>$row[CustomerName]</option>";
							}
						?>
					</select>
					
				</div>

				<div class="receiver">
					<label for="receiver-account">Receiver Name</label>
					<select name="receiver-account" id="receiver-account">
						<?php
							foreach ($res3 as $row) {
							echo "<option value = $row[CustomerName]>$row[CustomerName]</option>";
							}
						?>
					</select>
				</div>

				<div class="transfer-amount">
					<label for="transfer-amount">Amount</label>
					<input type="number" name="transfer-amount" id="transfer-amount" required>
				</div>

				<button type="submit" class="btn" id="btn_submit">Confirm</button>
				</form>
		</div>
	</main>
</body>
</html>


<script>
        const sender_opt = document.getElementById('sender-account');
        const receiver_opt = document.getElementById('receiver-account');
        const btn = document.getElementById('btn_submit');
        const amt = document.getElementById('transfer-amount');

        btn.addEventListener('click', () => {
            if (sender_opt.value === receiver_opt.value) {
                alert("Sender and Receiver Name cannot be same!");
            }
            else if (sender_opt.value !== receiver_opt.value && amt.value !== "") {
                alert("Transaction Done!");
            }
            else if (sender_opt.value !== receiver_opt.value && amt.value === "") {
                alert("Please the enter the amount!");
            }
        });
</script>