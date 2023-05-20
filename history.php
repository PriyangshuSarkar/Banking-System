<?php
	$con = mysqli_connect("localhost","root","","banking_system");
	$query = "select * from history";
	$result = mysqli_query($con,$query);
?>





<!DOCTYPE html>
<html>
<head>
	<title>Banking System</title>
	<link rel="stylesheet" type="text/css" href="history.css">
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
		<div class="history">
			<h1>Transaction History</h1>
			<table>
				<tr>
					<th>Date</th>
					<th>Sender's Name</th>
					<th>Receiver's Name</th>
					<th>Amount Transferd</th>
				</tr>
				<tbody>
					<tr>
					<?php 

					while($rew = mysqli_fetch_assoc($result))
					{
					?>

					<td><?php echo $rew['Date'];?></td>
					<td><?php echo $rew['SenderName'];?></td>
					<td><?php echo $rew['ReceiverName'];?></td>
					<td><?php echo $rew['Transfer'];?></td>
					
					</tr>

					<?php
					}

					?>
				</tbody>
			</table>
		</div>
	</main>
</body>
</html>
