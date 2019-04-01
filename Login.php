<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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

	<!-- Custom JS -->
	<script src="js/custom.js"></script>

  <!-- Custom font for this page -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet">

	<!-- GoogleAPIs jQuery import -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- MDBootstrap DataTables includes -->
	<link href="./css/datatables.min.css" rel="stylesheet">
	<script type="text/javascript" src="./js/datatables.js"></script>

  <!-- Google Material Icons -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

  <style type="text/css">
		body {
			font-family: 'Poppins', sans-serif;
		}
		body h1 b{
			color: black;
		}
		h1 {
			color: white;
		}
		div[id="dtTable_filter"] {
			display: none;
		}
		/* thead {
			background-color: #43c6ac;
		} */
		.signUpDiv {
			/* background: linear-gradient(to right, #cc2b5e, #753a88); */
			background: linear-gradient(to right, #4568dc, #b06ab3);
		}
		.loginDiv {
			/* background: linear-gradient(to right, #cc2b5e, #753a88); */
			background: linear-gradient(to right, #4568dc, #b06ab3);
		}
		.tableDiv {
			/* background: linear-gradient(to right, #cc2b5e, #753a88); */
			background: linear-gradient(to left, #4568dc, #b06ab3);
		}
	</style>
</head>

<body onload="renderBackground()">

		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<!-- <a href="./index.html">
						<i class="material-icons" style="font-size: 50px; color: black;">
							home
						</i>
					</a> -->
					<!-- Breadcrumbs -->
					<nav aria-label="breadcrumb" style="background-color: white;">
						<ol class="breadcrumb" style="background-color: white;">
							<li class="breadcrumb-item"><a href="./index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Get Started</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
						<h1 style="text-align: center;">
							<b>Get Started With</b>
							<img src="./img/aip_logo.png" id="logo" alt="AIP Logo" height="50px;" style="border-radius: 5px;">
						</h1>
				</div>
			</div>
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<!-- 1st Column: Sign Up Form -->
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="signUpDiv card shadow-lg p-3 mb-5 rounded text-white" id="signUpDiv" style="display: none;">
						<center>
							<h2><b>Sign Up here.</b></h2>
							<form name="signUpForm" method="POST" action="server.php">
								<?php include('errors.php'); ?>
								<!-- Row 1 -->
								<div class="form-row">
									<!-- First Name Field -->
									<div class="col">
										<label for="fname">First Name: </label>
										<input name="fnameField" id="fnameField" type="text" minlength="2" maxlength="100" class="form-control" onblur="nameFieldsValidator(document.signUpForm.fnameField)" required="required"/>
									</div>
									<!-- Last Name Field -->
									<div class="col">
										<label for="lname">Last Name: </label>
										<input name="lnameField" id="lnameField" type="text" minlength="2" maxlength="100" class="form-control" onblur="nameFieldsValidator(document.signUpForm.lnameField)" required="required"/>
									</div>
								</div>
								<br/>
								<!-- Row 2 -->
								<div class="form-row">
									<!-- Address field -->
									<div class="col">
										<label for="addr">Address: </label>
										<input type="text" name="addressField" minlength="15" maxlength="200" class="form-control" required="required"/>
									</div>
								</div>
								<br/>
								<!-- Row 3 -->
								<div class="form-row">
									<!-- State Field -->
									<div class="col">
										<label for="State">State: </label>
										<select name="stateField" class="form-control" required>
											<option value="MH">Maharashtra</option>
											<option value="GJ">Gujarat</option>
											<option value="RJ">Rajasthan</option>
										</select>
									</div>
									<!-- City Field -->
									<div class="col">
										<label for="city">City: </label>
										<input type="text" name="cityField" id="cityField" class="form-control" minlength="3" maxlength="50" onblur="nameFieldsValidator(document.signUpForm.cityField)" required="required"/>
									</div>
									<!-- Zip Code Field -->
									<div class="col">
										<label for="zip">Pin Code: </label>
										<input type="number" name="pinCodeField" class="form-control" minlength="6" maxlength="10" required="required"/>
									</div>
								</div>
								<br/>
								<!-- Row 4 -->
								<div class="form-row">
									<!-- username field -->
									<div class="col">
										<label for="username">Email ID: </label>
										<input name="unameField" id="unameField" type="email" class="form-control" minlength="8" maxlength="50" required="required"/>
									</div>
									<!-- Password field -->
									<div class="col">
										<label for="pwd">Password: </label>
										<input type="password" name="passwordField" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required"/>
									</div>
								</div>
								<br/>
								<!-- Row 5 -->
								<div class="form-row">
									<div class="col">
										<button type="submit" class="btn btn-light" name="reg_user">Sign Up</button>&nbsp;&nbsp;&nbsp;&nbsp;
										<button type="reset" class="btn btn-light">Reset</button>
									</div>
								</div>
							</form>

						</center>
					</div>
				</div>
				<!-- 2nd Column: Login Form -->
				<div class="col-md-6 col-sm-12 col-xs-12">
					<!-- Row 1 -->
					<div class="row">
						<div class="container">
							<div class="loginDiv card shadow-lg p-3 mb-5 rounded text-white" id="loginDiv">
								<center>
									<h2><b>Login here.</b></h2>
									<form name="loginForm" method="POST" action="server.php">
										<?php include('errors.php'); ?>
										<!-- Form Row 1 -->
										<div class="form-row">
											<!-- Username field -->
											<div class="col">
												<label for="username">EmailId: </label>
												<input type="email" class="form-control" minlength="8" required/>
											</div>
											<!-- Password Field -->
											<div class="col">
												<label for="pwd">Password: </label>
												<input type="password" class="form-control" minlength="8" required/>
											</div>
										</div>
										<br/>
										<!-- Form Row 2 -->
										<div class="form-row">
											<div class="col">
												<button type="submit" class="btn btn-light">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
												<button type="button" class="btn btn-light" id="showSignUpBtn">Sign Up</button>
											</div>
										</div>
									</form>
								</center>
							</div>
						</div>
					</div>
					<!-- Row 2 -->
					<div class="row">
						<div class="container">
							<div class="tableDiv card shadow-lg p-3 mb-5 rounded text-white" id="tableDiv">
								<h4><b>Our Users</b></h4>
								<table class="table table-striped table-border table-responsive text-center" id="dtTable">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th scope="col">First Name</th>
											<th scope="col">Last Name</th>
											<th scope="col">Handle</th>
										</tr>
									</thead>
									<tbody>
											<tr>
												<td>1001</td>
												<td>Jack</td>
												<td>Andressen</td>
												<td>oraclecloudaccount</td>
											</tr>
											<tr>
												<td>1002</td>
												<td>Norman</td>
												<td>Bates</td>
												<td>sapguy</td>
											</tr>
											<tr>
												<td>1003</td>
												<td>Jake</td>
												<td>Peralta</td>
												<td>diehard</td>
											</tr>
											<tr>
												<td>1004</td>
												<td>Gina</td>
												<td>Linetti</td>
												<td>ihatecharles</td>
											</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script>
		$(document).ready(function() {
			$("#showSignUpBtn").click(function() {
				$("#signUpDiv").toggle(1000);
			});
			$('#dtTable').dataTable({
				"pageLength": 2
			});
  		$('.dataTables_length').addClass('bs-select');
		});
	</script>
</body>
</html>
