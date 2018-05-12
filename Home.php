<?php
	session_start();
	if(!isset($_SESSION['logincust']))
	{
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Login with Google | Home</title>
	</head>
	<body style="height: 100% ; background: goldenrod">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<div class="container" style="margin-top:50px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="Final.png" ><br>
            </div>
        </div>
    </div>
		<?php
			//load data
			echo '
			<table class="table-hover" align="center" style="margin-top:50px;margin-bottom:50px;">
				<tr>
					<td><h2>Information Provider : </h2></td>
					<td><h1 style="color:green;">'.$_SESSION['oauth_provider'].'</h1></td>
				</tr>
				<tr>
					<td><h2>Account ID : </h2></td>
					<td><h1 style="color:green;">'.$_SESSION['oauth_uid'].'</h1></td>
				</tr>
				<tr>
					<td><h2>First Name : </h2></td>
					<td><h1 style="color:green;">'.$_SESSION['first_name'].'</h1></td>
				</tr>
				<tr>
					<td><h2>Last Name : </h2></td>
					<td><h1 style="color:green;">'.$_SESSION['last_name'].'</h1></td>
				</tr>
				<tr>
					<td><h2>Email : </h2></td>
					<td><h1 style="color:green;">'.$_SESSION['email'].'</h1></td>
				</tr>
			</table>';
		?>
		<form method="post" align="center"><input class="btn btn-danger" style="margin-top:5px;width:200px;height:35px;margin-bottom: 20px;" type="submit" value="Logout" name="logoutsr" width="48" height="48"></form>
		<?php
			if(isset($_POST['logoutsr']))
			{
				session_unset();
				echo "<script type='text/javascript'>location.href = 'index.php';</script>";
			}
		?>
	</body>
</html>