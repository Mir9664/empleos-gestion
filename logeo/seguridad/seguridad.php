<?php
    @session_start();
	if(isset($_SESSION['s2cd0rf1it8t'])){
		if ($_SESSION['s2cd0rf1it8t']!=1)
		{
			header("Location:../");
			exit();
		}else
		{
				$tp=$_SESSION['tp'];
		}
	}else
	{
			header("Location:../");
			exit();
	}
?>