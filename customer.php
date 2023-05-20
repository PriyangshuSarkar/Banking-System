<?php
	$con = mysqli_connect("localhost","root","","banking_system");
	$query = "select * from customer";
	$result = mysqli_query($con,$query);
?>




<!DOCTYPE html>
<html>
<head>
	<title>Banking System</title>
	<link rel="stylesheet" type="text/css" href="customer.css">
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
		<div class="customer">
			<h1>Customer Information</h1>
			<table>
				<thead>
					<tr>
						<th>Customer Name</th>
						<th>Account Number</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php 

					while($rew = mysqli_fetch_assoc($result))
					{
					?>
					<td><?php echo $rew['CustomerName'];?></td>
					<td><?php echo $rew['AccountNumber'];?></td>
					<td><?php echo $rew['Balance'];?></td>

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
