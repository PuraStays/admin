<?php
if (session_status() == PHP_SESSION_NONE) {
	 	session_start();
}

if(isset($_SESSION["counselling_login_status"]))
	{
		if($_SESSION["counselling_login_status"] == "login")
			{
				if($_SESSION["user_type"]!= "counseller")
					{
							printf("<script>location.href='login.php?invalid_acess'</script>");
							exit();		
					}
				if($_SESSION["id"]== "")
					{
							printf("<script>location.href='login.php?invalid_acess'</script>");
							exit();		
					}
			}
		else
			{
				printf("<script>location.href='login.php?invalid_acess'</script>");
				exit();
			}
	}
else
	{
		printf("<script>location.href='login.php?invalid_acess'</script>");
		exit();
	}
?>