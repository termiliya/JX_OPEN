<center>
<?php
//增删管理员
header("content-type:text/html;charset=utf-8");

if(!isset($_COOKIE["user"]))
{
	?>
	<script type="text/javascript">
	alert("您没有登录");
	</script>
	 <?php
	header("refresh:0;url=login.php");
}
else
{
	if(!isset($_GET["user1"])||!isset($_GET["user2"])){
	echo "<table class='hovertable'><thead><tr><td colspan='2'>以下为所有普通成员：</td></tr></thead>";
	include "config.php";
	$sql="select * from $test_user where admin='0'";
	$result=$mysqli->query($sql) or die($mysqli->error);
	while($row=$result->fetch_array())
	{
		echo "<tr>";
		echo "<td>用户名：</td><td>".$row["name"]."</td>";
		echo "</tr>";
	}
	echo "<thead><tr><td colspan='2' align='center'>以下为所有管理员：</td></tr></thead>";
	include "config.php";
	$sql="select * from $test_user where admin='1'";
	$result=$mysqli->query($sql) or die($mysqli->error);
	while($row=$result->fetch_array())
	{	
		echo "<tr>";
		echo "<td>管理员：</td><td>".$row["name"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	
	<style type="text/css">
		
		table {
    font-family: verdana,arial,sans-serif;
    font-size:11px;
    color:#333333;
    border-width: 1px;
    border-color: #999999;
    border-collapse: collapse;
}
table.hovertable thead td{
    background-color:#CCE8EB;
    border-width: 1px;
    padding: 20px;
    border-style: solid;
    border-color: #F5FAFA;
    width:600px;
}
table.hovertable tr:nth-child(odd) {
    background:#fff;
}
table.hovertable tr:nth-child(even) {
    background:#F5FAFA;
}
table.hovertable td {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #c3dde0;
}
		
input{
	transition:all 0.30s ease-in-out;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	
	border:#35a5e5 1px solid;
	border-radius:3px;
	outline:none;
}
input:focus{
	box-shadow:0 0 5px rgba(81, 203, 238, 1);
	-webkit-box-shadow:0 0 5px rgba(81, 203, 238, 1);
	-moz-box-shadow:0 0 5px rgba(81, 203, 238, 1);
}

a,#sub{
	text-decoration:none;
	background:rgba(81, 203, 238, 1);
	color:white;padding: 6px 25px 6px 25px;
	font:12px '微软雅黑';
	border-radius:3px;
	
	-webkit-transition:all linear 0.30s;
	-moz-transition:all linear 0.30s;
	transition:all linear 0.30s;
}
#sub{
	border: none;
}
a:hover,#sub:hover{background:rgba(39, 154, 187, 1);}
</style>
	
	
	
	
	<form method="get" action="addadmin.php">
		<table >
	<tr><td>输入用户名给予管理员权限：</td><td><input type="text" size="20" name='user1'></td></tr>
	<p>
	<tr><td>输入用户名给予普通用户权限：</td><td><input type="text" size="20" name='user2'></td></tr><p>
		</table>
		<a><input type="submit" name="admin" value="提交" id="sub"></a>
	</form>
	<?php
	}
	else{
	if($_GET["user1"]!="")
	{
		$name=$_GET["user1"];
		include "config.php";
		$sql="select * from $test_user where name='$name'";
		$result=$mysqli->query($sql) or die($mysqli->error);
		$num=$result->num_rows;
		if($num!=0)
		{
			$sql1="update $test_user set admin ='1' where name='$name'";
			$result1=$mysqli->query($sql1) or die($mysqli->error);
			?><script type="text/javascript">alert("success admin!");</script><?php
		}
		else{
			?>
			<script type="text/javascript">alert("failed admin! no user");</script>
			<?php
		    }
	}
	
	if($_GET["user2"]!="")
	{
		$name=$_GET["user2"];
		include "config.php";
		$sql="select * from $test_user where name='$name'";
		$result=$mysqli->query($sql) or die($mysqli->error);
		$num=$result->num_rows;
		if($num!=0)
		{
			$sql1="update $test_user set admin ='0' where name='$name'";
			$result1=$mysqli->query($sql1) or die($mysqli->error);
			?><script type="text/javascript">alert("success user!");</script><?php
		}
		else{
			?>
			<script type="text/javascript">alert("failed admin! no user");</script>
			<?php
		    }
	}
    }
}
?>
</center>