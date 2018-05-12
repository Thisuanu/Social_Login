<?php
	session_start();
	if(isset($_SESSION['logincust']))
	{
		header('Location: Home.php');
	}
	else
	{
		session_unset();
	}
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<title>Login with Google | Login</title>
	</head>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <body style="height: 100% ; background: goldenrod">
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <img src="Final.png" style="margin-bottom: 20px"><br>
                <form>
                    <input name="email" placeholder="Email" class="form-control"><br>
                    <input name="password" type="password" placeholder="password" class="form-control"><br>
                    <input type="submit" value="LogIn" class="btn btn-success">

                </form>
            </div>
        </div>
    </div>
    <br>
    <h5 style="margin-left:50%">or</h5>
    <br>




		<?php
			include_once 'loginG.php';
			if(isset($_GET['code'])){
				$gClient->authenticate($_GET['code']);
				$_SESSION['token'] = $gClient->getAccessToken();
				header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
			}
			if (isset($_SESSION['token'])) {
				$gClient->setAccessToken($_SESSION['token']);
			}
			if ($gClient->getAccessToken()) 
			{
				$gpUserProfile = $google_oauthV2->userinfo->get();
				$_SESSION['oauth_provider'] = 'Google'; 
				$_SESSION['oauth_uid'] = $gpUserProfile['id']; 
				$_SESSION['first_name'] = $gpUserProfile['given_name']; 
				$_SESSION['last_name'] = $gpUserProfile['family_name']; 
				$_SESSION['email'] = $gpUserProfile['email'];
				$_SESSION['logincust']='yes';
			} else {
				$authUrl = $gClient->createAuthUrl();
				$output= '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/images.png" class="img-rounded" style="display:block; margin-left:auto;margin-right:auto;width:300px;border-radius:5px;" /></a>';
			}
			echo $output;
		?>
	</body>
</html>