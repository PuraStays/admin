<?php
session_start();

if(isset($_SESSION["login_status"]))
	{
		if($_SESSION["login_status"] == "login")
			{
				if($_SESSION["user_type"]== "admin")
					{
						$dashboard_url = 'https://www.amecet.in/admin/index.php?m=management&p=registration';
					}
				else if($_SESSION["user_type"]== "members")
					{
						$dashboard_url = 'https://www.amecet.in/members/index.php?m=management&p=registration';		
					}
				else if($_SESSION["user_type"]== "associates")
					{
						$dashboard_url = 'https://www.amecet.in/associates/index.php?m=management&p=registration';				
					}
				else if($_SESSION["user_type"]== "student")
					{
						$dashboard_url = 'https://www.amecet.in/dashboard.php';						
					}
				else
				{
					//printf("<script>location.href='https://www.amecet.in/index.php?logout&id=1'</script>");
					//exit();		
				}

			}
		else
			{
				//printf("<script>location.href='https://www.amecet.in/index.php?logout&id=2'</script>");
				//exit();
			}
	}
	else
	{
	//	printf("<script>location.href='https://www.amecet.in/index.php?logout&id=3'</script>");
	//	exit();
	}
?>