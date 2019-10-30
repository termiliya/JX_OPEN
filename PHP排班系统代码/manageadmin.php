<style type="text/css">
	input{background:#c3dde0;}
		table.hovertable {
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
    padding: 8px;
    border-style: solid;
    border-color: #F5FAFA;
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
	
</style>
<?php
header("content-type:text/html;charset=utf-8");
 if(!isset($_COOKIE["user"]) or $_COOKIE["user"]=="")
 {
 	//echo "你还没有登录<p>";
 	//echo "<a href='login.php'>登录</a>&nbsp;&nbsp;&nbsp;<a href='reg.php'>注册</a>";
 	header("refresh:0;url=login.php");
 }
 else
 {
 	include "config.php";
 	$name=$_COOKIE["user"];
 	$sql="SELECT admin FROM $test_user WHERE name ='$name'";
 	$result=$mysqli->query($sql);
 	$admin=$result->fetch_array();
 	//include "kuangjia.php";
 	
//检验该用户是否有历史交班记录
echo "<center>";
//include "owntable.php";
?>

<div style="background: #c3dde0;width: 1500px;">欢迎使用管理窗口</div>
<?php
include "config.php";
$uname=$_COOKIE["user"];
$sql="select * from $test_user where admin='0'";
$result=$mysqli->query($sql);
$num=$result->num_rows;
if($num==0)
{
	echo "还没有成员";
	//echo "<p><a href='add_table.php'>点击添加排班</a>";
	//echo "<p><a href='index.php'>返回首页</a>";
}
else
{
	if(!isset($_POST["chakan"]) and !isset($_POST["del"])){
	echo "下面是成员信息";
	?>
	<form method="post" action="manageadmin.php">
		<?php
	echo "<table border='1' width='1500' class='hovertable'>";
	echo "<thead><tr bgcolor='burlywood'><td>姓名</td><td>电话</td><td>学号</td><td>部门</td><td>点击查看该名同学提交的排班</td><td>删除成员账号</td></tr></thead>";
	$i=0;

	while($row=$result->fetch_array())
	{
		echo "<tr bgcolor='bisque'>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['tel']."</td>";
		echo "<td>".$row['schoolcard']."</td>";
		echo "<td>".$row['partment']."</td>";
		$check1[$i]=$row["name"];
		$check=$check1[$i];
	echo "<td>";
	?>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css" />
		<!--引入图标样式-->
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css" />
		
	<?php
	echo "<i class='fa fa-trash' aria-hidden='true'><input type='submit' name='chakan' value='$check' ></i>";
	//echo "<input type='text' name='chakan1[]' value='$check' hidden>";
	echo "</td>";
	echo "<td><input type='submit' name='del' value='$check'></td>";
	//echo "<td><a><input type='button' onclick='check('jx')' value='查看'></a></td>";
	echo "</tr>";
	
		$i++;
}
//if($_POST["chakan"]){check("$check");}
//	else{}
echo "</table>";
?>
</form>
<?php
	}
	else if(!isset($_POST["del"]))//查看信息
	{
		$chakan=$_POST["chakan"];
		function check($check){
			include "config.php";
			$sql1="select * from $test_table where uname='$check'";
			$result1=$mysqli->query($sql1) or die($mysqli->error);
			$num1=$result1->num_rows;
	if($num1==0)
{
	echo "该用户没有提交过排班";
	//echo "<p><a href='add_table.php'>点击添加排班</a>";
}
else
{
	?>
	<style type="text/css"></style>
	<?php
	echo "下面为".$check."提交的历史记录";
	echo "<table  width='1000px'>";
	echo "<tr bgcolor='#F5FAFA'><td></td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td></tr>";
	$i=0;
	while($row1=$result1->fetch_array())
	{
		if($i%5==0&&$i!=0)
		{
			echo "</tr >";
		}
		if($i%5==0)
		{
			echo "<tr bgcolor='#B7D2FF'>";
			$x=$i/5+1;
			echo "<td bgcolor='#F5FAFA'>"."第"."$x"."节"."</td>";
		}
		if($row1["answer"]==1)
			{
				echo "<td align='center' text-color='red'>已选</td>";
			}
			else
			{
				echo "<td></td>";
			}
			$i++;
	//echo "<p><a href='add_table.php'>点击添加排班</a>";
	}
	echo "</tr>";
	echo "</table>";
}
	echo "<a href='manageadmin.php'>上一步</a><p>";
return 0;
}
		check($chakan);
	}
	else if(!isset($_POST["chakan"]))//删除信息
	{
		$del=$_POST["del"];
		function del($check)
		{
			include "config.php";
			$sql="delete from $test_table where uname='$check'";
			$result=$mysqli->query($sql) or die($mysqli->error);
			$sql1="delete from $test_user where name='$check'";
			$result1=$mysqli->query($sql1) or die($mysqli->error);
			if($result1 and $result)
			{
				?>
			<script type="text/javascript">alert("删除成功");</script>
			<?php
			}
			else
				alert("删除失败");
			return 0;
		}
		del($del);
		header("refresh:0;url=manageadmin.php");
	}
}
//check("jx")
}
?>
					<div class="footer">
				<div class="footer-inner" >
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Auto</span>
							arrange the schedua &copy; start 2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>
			<?php
echo "</center>";
?>