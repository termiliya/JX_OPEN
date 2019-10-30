<?php
header("content-type:text/html;charset=utf-8");
//include "check_admin.php";
if(!isset($_POST["sub"]))
{
	
	echo "<center>";
	echo "添加排班信息<p>";
		?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">tr,input{background: antiquewhite;}</style>
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
		 	
		 	
		 	
		 	
		 	
        input[type=checkbox] {
            position: relative;
            width: 10px;
            height: 1px;
        }
        input[type=checkbox]::before{
            content:'';
            position: absolute;
            top: 0;
            left: 0;
            width: 22px;
            height: 22px;
            line-height:22px;
            text-align: center;
            color:white;
            font-size:16px;
            background-color:#999;
            border-radius: 4px;
        }
        input[type=checkbox]:checked::before {
            color:black;
            background-color:#F5FAFA;
            content: '值';
        }
        .close{
	background-color: #f44336;
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	cursor: pointer;
	position:fixed;
	top:10px;
	right:5px;
}

.close:hover {
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}


    </style>
	</head>
	<body>
		<div>
		<input type="button" value="关闭当前页" class="close" onclick="closeWin1()">
		</div>
		<form method="post" action="add_table.php" name="form1">
		<table border="1" width='1000' height='400' class="hovertable">
			<thead>
			<tr>
				<td></td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td>
			</tr>
			</thead>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第一节</td>
				<td><input type="checkbox" name="tim[]" value="1"></td>
				<td><input type="checkbox" name="tim[]" value="2"></td>
				<td><input type="checkbox" name="tim[]" value="3"></td>
				<td><input type="checkbox" name="tim[]" value="4"></td>
				<td><input type="checkbox" name="tim[]" value="5"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第二节</td>
				<td><input type="checkbox" name="tim[]" value="6"></td>
				<td><input type="checkbox" name="tim[]" value="7"></td>
				<td><input type="checkbox" name="tim[]" value="8"></td>
				<td><input type="checkbox" name="tim[]" value="9"></td>
				<td><input type="checkbox" name="tim[]" value="10"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第三节</td>
				<td><input type="checkbox" name="tim[]" value="11"></td>
				<td><input type="checkbox" name="tim[]" value="12"></td>
				<td><input type="checkbox" name="tim[]" value="13"></td>
				<td><input type="checkbox" name="tim[]" value="14"></td>
				<td><input type="checkbox" name="tim[]" value="15"></td>			
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第四节</td>
				<td><input type="checkbox" name="tim[]" value="16"></td>
				<td><input type="checkbox" name="tim[]" value="17"></td>
				<td><input type="checkbox" name="tim[]" value="18"></td>
				<td><input type="checkbox" name="tim[]" value="19"></td>
				<td><input type="checkbox" name="tim[]" value="20"></td>
				
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第五节</td>
				
				<td><input type="checkbox" name="tim[]" value="21"></td>
				<td><input type="checkbox" name="tim[]" value="22"></td>
				<td><input type="checkbox" name="tim[]" value="23"></td>
				<td><input type="checkbox" name="tim[]" value="24"></td>
				<td><input type="checkbox" name="tim[]" value="25"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第六节</td>
				
				<td><input type="checkbox" name="tim[]" value="26"></td>
				<td><input type="checkbox" name="tim[]" value="27"></td>
				<td><input type="checkbox" name="tim[]" value="28"></td>
				<td><input type="checkbox" name="tim[]" value="29"></td>
				<td><input type="checkbox" name="tim[]" value="30"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第七节</td>
				
				<td><input type="checkbox" name="tim[]" value="31"></td>
				<td><input type="checkbox" name="tim[]" value="32"></td>
				<td><input type="checkbox" name="tim[]" value="33"></td>
				<td><input type="checkbox" name="tim[]" value="34"></td>
				<td><input type="checkbox" name="tim[]" value="35"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第八节</td>
				
				<td><input type="checkbox" name="tim[]" value="36"></td>
				<td><input type="checkbox" name="tim[]" value="37"></td>
				<td><input type="checkbox" name="tim[]" value="38"></td>
				<td><input type="checkbox" name="tim[]" value="39"></td>
				<td><input type="checkbox" name="tim[]" value="40"></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第九节</td>
				
				<td><input type="checkbox" name="tim[]" value="41"></td>
				<td><input type="checkbox" name="tim[]" value="42"></td>
				<td><input type="checkbox" name="tim[]" value="43"></td>
				<td><input type="checkbox" name="tim[]" value="44"></td>
				<td><input type="checkbox" name="tim[]" value="45"></td>
			</tr>
		</table>
		<input type="submit" value="确认提交" name="sub"/>
		<input type="button" value="返回主界面" id="back1"/>
		</form>
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
	</body>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
				function closeWin1(){
	//有关闭确认
	if(confirm("您确定要关闭本页吗？")){
		window.opener=null;
		window.open('','_self');
		window.close();
	}
		}
		$(function(){
			$("#back1").click(function(){
				location.href="index.php";
			});
		})

	</script>
</html>

<?php
}
else{
	function insert()
 { 
	include "config.php";
	$uname=$_COOKIE["user"];
	//删除以前的历史记录
	$sql="delete from $test_table where uname='$uname'";
	$result=$mysqli->query($sql) or die($mysqli->error);
 
  	$tim=$_POST["tim"];
  	$m=0;
 	for( $i=1;$i<=45;$i++)
  {
  	//$checktim=$_POST["tim['$i']"];
  	//$_POST["tim['$i']"]==1
  	if($tim[$m]==$i)
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
  return 0;
}
  if(insert()==0)
  {
  	?>
  	<script type="text/javascript">
  	alert("成功更新排班");
  	function closeWin(){
	//有关闭确认
	//if(confirm("您确定要关闭本页吗？")){
		window.opener=null;
		window.open('','_self');
		window.close();
	//}
}
closeWin();

  </script>
 
  	<?php

	header("refresh:2;url=add_table.php");

	
  }
  else 
  {
  	?>
  	<script type="text/javascript">alert("排班提交出错");</script>
  	<?php
  	header("refresh:0;url=add_table.php");
  	
  }
}echo "</center>";
