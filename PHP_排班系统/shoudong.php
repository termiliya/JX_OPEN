<?php
header("content-type:text/html;charset=utf-8");
if(!isset($_COOKIE["user"]) or $_COOKIE["user"]=="")
{
 	?>
	<script type="text/javascript">
	alert("您没有登录");
	</script>
	 <?php
	header("refresh:0;url=index.php");
}
else{
		
		function update()
 		{ 
			include "config.php";
			$sql="delete from end_table";
			$result=$mysqli->query($sql) or die($mysqli->error);
		  	$tim=$_POST["tim"];
		  	$tim1=$_POST["tim1"];
		  	//print_r($tim);
		  	//print_r($tim1);
		  	//print_r(count($tim));
		  	for($temp=0;$temp<count($tim);$temp++)
		  	{
		  		$uname=$tim[$temp];
		  		$m=$tim1[$temp];
		  		$sql="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','$uname',1,'$m')";
  				$result=$mysqli->query($sql) or die($mysqli->error);
  				header("refresh:0;url=end_print.php");
		  	}
		  	/*$temp=0;
		  	for( $i=0;$i<45;$i++)
		  	{
		  		$m=$i+1;
		  		if($tim[$i][$temp])
		  		{
		  			$uname=$tim[$i][$temp];
		  			$sql="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','$uname',1,'$m')";
  					$result=$mysqli->query($sql) or die($mysqli->error);
  					$temp++;
		  		}
		  		else
		  		{
		  			$sql="INSERT INTO $test_table(content,answer,quan) VALUES('$m',0,'$m')";
		  			$result=$mysqli->query($sql) or die($mysqli->error);
		  		}
		  	}*/
		  	/*$m=0;
		 	for( $i=1;$i<=45;$i++)
		  {
		  	//$checktim=$_POST["tim['$i']"];
		  	//$_POST["tim['$i']"]==1
		  	if($tim[$m][]==$i)
		  		{
		  			$sql="INSERT INTO $test_table(content,uname,answer,quan) VALUES('$i','$uname',1,'$i')";
		  			$result=$mysqli->query($sql) or die($mysqli->error);
		  			if($m<count($tim)-1)
		  			$m++;
		  			
		  		}
		  	else
		  		{
		  			$sql="INSERT INTO $test_table(content,uname,answer,quan) VALUES('$i','$uname',0,'$i')";
		  			$result=$mysqli->query($sql) or die($mysqli->error);

		  		}
		  }
		  return 0;*/
		}
		update();
	}
	


?>