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

	<!-- MDBootstrap DataTables includes -->
	<link href="./css/datatables.min.css" rel="stylesheet">
	<script type="text/javascript" src="./js/datatables.js"></script>

	<style type="text/css">
		body {
			font-family: 'Poppins', sans-serif;
		}
	</style>
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

</body>
</html>