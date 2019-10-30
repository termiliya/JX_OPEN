<?php
header("content-type:text/html;charset=utf-8");


if(!isset($_COOKIE["user"]))
{
	?>
	<script type="text/javascript">alert("请登录后再操作");</script>
	<?php
	header("refresh:0;url=login.php");
}
else
{
	$user=$_COOKIE["user"];
	$old_pass=$_POST["pass"];
	$new_pass=$_POST["pass1"];
	$new_pass2=$_POST["pass2"];
	include "config.php";
	$sql="SELECT * FROM $test_user WHERE name='$user' AND pass='$old_pass'";
	$result=$mysqli->query($sql);
	$num=$result->num_rows;
	if($num==0)
	{
		?>
		<script type="text/javascript">alert("原密码输入错误");</script>
		
		
		<script type="text/javascript">
			location="index.php";
			window.onload = function() {
			$("#div_pwd").window("open");
			}
		</script>
		<?php
	}
	else if($new_pass2!=$new_pass)
	{
		?>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<!--引入EasyUi的js文件-->
		<script src="js/ui.js" type="text/javascript" charset="utf-8"></script>
		<style>
			alert {
				width: 90%;
				text-align: center;
				color: #fff;
				margin: 10px auto;
				border-radius: 5px;
				line-height: 30px;
				cursor: pointer;
				background: #4ab819;
			}
			
			.confirm {
				background: #196fb8;
			}
			
			.open {
				background: #f88408;
			}
			
			.toast {
				background: #f80851;
			}
			
			.later {
				background: #a9a9a9;
			}
		</style>
		
		<script type="text/javascript">
			alert("两次密码不一致");
		//$.messager.alert("密码校验","两次密码输入不一致", "error");
		
		location="index.php";
			window.onload = function() {
			$("#div_pwd").window("open");
			}
		</script>
		<?php
	}
	else
	{
		
		$sql="UPDATE $test_user SET pass='$new_pass' WHERE name='$user' AND pass='$old_pass'";
		$result=$mysqli->query($sql);
		?>

		<script type="text/javascript">alert("修改密码成功");
		location="index.php";
		
			$(document).ready(function(){ 
			$.messager.show({
							title: '密码修改',
							msg: '密码修改成功，新密码为:'+$(":password:eq(2)").val(),
							timeout: 3000,
							showType: 'slide'
						});
					});
		</script>
		<?php

	}
}
	
		
		
		?>