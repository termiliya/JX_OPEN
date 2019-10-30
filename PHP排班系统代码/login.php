

<?php
header("content-type:text/html;charset=utf-8");
if(empty($_POST["user"])||empty($_POST["pass"]))
{
	include "login.html";
}
else 
{
	include "config.php";
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	$sql="select id from $test_user where name='$user' and pass ='$pass'";
	$result=$mysqli->query($sql);
	$num=$result->num_rows;
	if($num==0)
	{
		//echo "用户名或密码错误<p>";
		//echo "<a href ='login.php'>重新登录</a>";
		include "login.html";
		?>
		<script>
		//var surePwd_pass = document.getElementById("check");
		checkcode.style.fontSize = "13px";
        checkcode.style.color="red";
        checkcode.style.textAlign="right";
        checkcode.style.lineHeight="2em";
        checkcode.innerHTML = '输入的账号或密码不正确，请重新输入';
        checkcode.style.display="block";
        checkcode.style.color="red";  
		</script>
		<?php
	
	}
	else
	{
		$sql="select name from $test_user where name='$user' and pass ='$pass'";
		$result=$mysqli->query($sql);
		$user=$result->fetch_array();
		setcookie("user",$user[0]);
		//echo "<p><a href='index.php'>进入系统</a>";
	
		header("refresh:0;url=index.php");
		
	}
}

?>

