<?php
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Custom font for this page -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet">

	<style type="text/css">
		body {
			font-family: 'Poppins', sans-serif;
		}
	</style>

	<script>    
			if(typeof window.history.pushState == 'function') {
					window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
			}
	</script>
</head>
<body>

		<nav class="navbar navbar-dark bg-primary">
			<a class="navbar-brand" href="#">
				<img src="./img/usr.png" width="30" height="30" class="d-inline-block align-top" alt="">
				<?php if(isset($_SESSION['username'])) : ?>
					<?php echo $_SESSION['username']; ?>
				<?php endif ?>
			</a>
			<span class="navbar-text">
			<p> <a href="welcome.php?logout='1'">logout</a> </p>
			</span>
		</nav>

		<div class="container">
			<br/>
			<br/>
			<!-- Generated Voucher Information -->
			<div class="row">
				<div class="container">
					<?php
						if(isset($_GET["isPdfSuccess"])) {
							echo "<h1 style='text-align: center;'>Voucher Details: </h1>";
							echo "
							<form action='saveVoucher.php' method='POST'>
							<table class='table table-hover table-responsive'>
								<thead class='thead-dark'>
									<tr>
										<th>Created By</th>
										<th>Invoice Number</th>
										<th>Invoice Date</th>
										<th>File Name</th>
										<th>Total Amount</th>
										<th>Supplier Company</th>
										<th>Supplier GSTIN</th>
										<th>Consumer Company</th>
										<th>Consumer Account No.</th>
										<th>Consumer IFSC Code</th>
										<th>Save</th>
									</tr>
								</thead>
								<tbody>
							";
							echo "<tr>";
							echo "<td>".$_SESSION["username"]."</td>";
							echo "<td><input class='form-control' type='text' name='invoice_no' value='".trim($_GET["invoice_no"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='invoice_date' value='".trim($_GET["invoice_date"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='file_name' value='".$_GET["file_name"]."'/></td>";
							echo "<td><input class='form-control' type='text' name='total_amt' value='".trim($_GET["total_amt"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='supplier_name' value='".trim($_GET["supplier_name"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='supplier_gstin' value='".trim($_GET["supplier_gstin"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='consumer_name' value='".trim($_GET["consumer_name"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='consumer_accno' value='".trim($_GET["consumer_accno"])."'/></td>";
							echo "<td><input class='form-control' type='text' name='consumer_ifsc' value='".trim($_GET["consumer_ifsc"])."'/></td>";
							echo "<td><button type='submit' class='btn btn-primary' name='save_voucher'>Save</button></td>";
							echo "</tr>";
							echo "</tbody></table></form>";
						} elseif(isset($_GET["isVoucherSave"])) {
							echo "<div class='alert alert-success'><span>Voucher Saved Successfully!</span></div>";
						}
					?>
				</div>
			</div>
			<br/>
			<br/>
			<!-- Upload PDF Form -->
			<div class="row">
				<div class="container">
					<h1 style="text-align: center;">Create New Voucher:</h1>
					<div class="row">
						<div class="container">
							<?php
								if(isset($_GET["err"])) {
									echo "<div class='alert alert-danger'>";
									$errno = $_GET["err"];
									if($errno == "1") {
										echo "File Already Exists!"."<br/>";
									}
									elseif($errno == "2") {
										echo "File size exceeds max limit!"."<br/>";
									}
									elseif($errno == "3") {
										echo "File type not supported!"."<br/>";
									}
									echo "</div>";
								} elseif(isset($_GET["msg"])) {
									echo "<div class='alert alert-success'>";
									echo $_GET["msg"]."<br/>";
									echo "</div>";
								}
							?>
						</div>
					</div>
					<form action="file_upload.php" id="myForm" name="frmupload" method="post" enctype="multipart/form-data">
						<div class="container-fluid">
						<table class="table table-borderless table-responsive">
							<tbody>
								<tr>
									<td><input type="file" id="upload_file" name="upload_file"/></td>
									<td><input class="btn btn-primary pull-right" type="submit" name='submit_pdf' value="Add PDF"/></td>
								</tr>
							</tbody>
						</table>
						</div>
					</form>
				</div>
			</div>
			<br/>
			<br/>
			<!-- Dynamic Table of Generated Vouchers -->
			<div class="row">
				<div class="container">
					<h1 style="text-align: center;">Your Vouchers:</h1>
					<?php
						$db = mysqli_connect('localhost','phpmyadmin','root','aip');
						if(mysqli_connect_errno()) {
							echo "Failed to connect to MySQL: ". mysqli_connect_errno();
						}
						$user_id = $_SESSION["username"];
						$query = "SELECT * FROM vouchers WHERE created_by='$user_id'";
						$result = mysqli_query($db,$query);
						echo "
							<div class='container-fluid'>
							<table class='table table-hover table-responsive'>
								<thead class='thead-dark'>
									<tr>
										<th>ID</th>
										<th>Created By</th>
										<th>Invoice No</th>
										<th>Invoice Date</th>
										<th>File Name</th>
										<th>Total Amount</th>
										<th>Supplier Name</th>
										<th>Supplier GSTIN</th>
										<th>Consumer Name</th>
										<th>Consumer Acc. No</th>
										<th>Consumer IFSC</th>
									</tr>
								</thead>
								<tbody>
						";
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$row["id"]."</td>";
							echo "<td>".$row["created_by"]."</td>";
							echo "<td>".$row["invoice_no"]."</td>";
							echo "<td>".$row["invoice_date"]."</td>";
							echo "<td>".$row["file_name"]."</td>";
							echo "<td>".$row["total_value"]."</td>";
							echo "<td>".$row["supplier_name"]."</td>";
							echo "<td>".$row["supplier_gstin"]."</td>";
							echo "<td>".$row["consumer_name"]."</td>";
							echo "<td>".$row["consumer_accno"]."</td>";
							echo "<td>".$row["consumer_ifsc"]."</td>";
							echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
						echo "</div>";

						mysqli_close($db);
					?>
				</div>
			</div>
		</div>

</body>
</html>