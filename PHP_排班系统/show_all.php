
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
include "config.php";
 	$name=$_COOKIE["user"];
 	$sql="SELECT admin FROM $test_user WHERE name ='$name'";
 	$result=$mysqli->query($sql);
 	$admin=$result->fetch_array();
 	//include "kuangjia.php";
	echo "<center>";
	$sql="select * from $test_table";
	$result=$mysqli->query($sql) or die($mysqli->error);
	$num=$result->num_rows;
	if($num==0)
	{
		echo "还没有同学提交过排班";
		echo "<p><a href='manageadmin.php'>点击返回</a>";
	}
	else
	{
		?>
		<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic DataGrid - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="./css/easyui.css">
	<link rel="stylesheet" type="text/css" href="./css/icon.css">
	<link rel="stylesheet" type="text/css" href="./css/demo.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.easyui.min.js"></script>
	<style type="text/css">
		.btn-bubble {
  color: white;
  background-color: #77b11c;
  background-repeat: no-repeat;
}
.btn-bubble:hover, .btn-bubble:focus {
  -webkit-animation: bubbles 1s forwards ease-out;
          animation: bubbles 1s forwards ease-out;
  background: radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 90% 90% / 0.88em 0.88em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 23% 141% / 0.81em 0.81em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 17% 90% / 0.68em 0.68em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 15% 94% / 1.12em 1.12em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 42% 126% / 0.86em 0.86em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 102% 120% / 0.58em 0.58em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 12% 121% / 0.67em 0.67em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 69% 87% / 1.18em 1.18em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 32% 99% / 0.79em 0.79em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 84% 129% / 0.79em 0.79em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 40% 99% / 0.72em 0.72em;
  background-color: #77b11c;
  background-repeat: no-repeat;
}

@-webkit-keyframes bubbles {
  100% {
    background-position: 92% -220%, 31% -185%, 24% 6%, 16% -328%, 39% -366%, 110% -375%, 5% -60%, 59% -365%, 41% -363%, 82% -8%, 37% -224%;
    box-shadow: inset 0 -6.5em 0 #0072c4;
  }
}

@keyframes bubbles {
  100% {
    background-position: 92% -220%, 31% -185%, 24% 6%, 16% -328%, 39% -366%, 110% -375%, 5% -60%, 59% -365%, 41% -363%, 82% -8%, 37% -224%;
    box-shadow: inset 0 -6.5em 0 #0072c4;
  }
}


.btn {
  display: inline-block;
  text-decoration: none;
  padding: 1em 2em;
}
		
		
		
		input{background:#c3dde0;}
		table.hovertable {
    font-family: verdana,arial,sans-serif;
    font-size:15px;
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
</head>
<body>
	<h2>WELCOME</h2>
	<p>welcome to use auto-arrange-schedual</p>
	<div style="margin:20px 0;"></div>
	<table class="easyui-datagrid" title="所有提交的排班" style="width:900px;height:250px"
			 iconCls='icon-table'  rownumbers='true' fitColumns='true' singleSelect='true' toolbar='#toolbar'">
		<thead>
			<tr>
				<th data-options="field:'0'">姓名</th>
				<th data-options="field:'1'">1</th>
				<th data-options="field:'2'">2</th>
				<th data-options="field:'3'">3</th>
				<th data-options="field:'4'">4</th>
				<th data-options="field:'5'">5</th>
				<th data-options="field:'6',align:'center'">6</th>
				<th data-options="field:'7'">7</th>
				<th data-options="field:'8'">8</th>
				<th data-options="field:'9',align:'center'">9</th>
				<th data-options="field:'10'">1</th>
				<th data-options="field:'11'">2</th>
				<th data-options="field:'12'">3</th>
				<th data-options="field:'13'">4</th>
				<th data-options="field:'14'">5</th>
				<th data-options="field:'15',align:'center'">6</th>
				<th data-options="field:'16'">7</th>
				<th data-options="field:'17'">8</th>
				<th data-options="field:'18',align:'center'">9</th>
				<th data-options="field:'19'">1</th>
				<th data-options="field:'20'">2</th>
				<th data-options="field:'21'">3</th>
				<th data-options="field:'22'">4</th>
				<th data-options="field:'23'">5</th>
				<th data-options="field:'24',align:'center'">6</th>
				<th data-options="field:'25'">7</th>
				<th data-options="field:'26'">8</th>
				<th data-options="field:'27',align:'center'">9</th>
				<th data-options="field:'28'">1</th>
				<th data-options="field:'29'">2</th>
				<th data-options="field:'30'">3</th>
				<th data-options="field:'31'">4</th>
				<th data-options="field:'32'">5</th>
				<th data-options="field:'33',align:'center'">6</th>
				<th data-options="field:'34'">7</th>
				<th data-options="field:'35'">8</th>
				<th data-options="field:'36',align:'center'">9</th>
				<th data-options="field:'37'">1</th>
				<th data-options="field:'38'">2</th>
				<th data-options="field:'39'">3</th>
				<th data-options="field:'40'">4</th>
				<th data-options="field:'41'">5</th>
				<th data-options="field:'42',align:'center'">6</th>
				<th data-options="field:'43'">7</th>
				<th data-options="field:'44'">8</th>
				<th data-options="field:'45',align:'center'">9</th>
			</tr>
		</thead>
		<tbody>
			
		<?php 
		$sql="select distinct uname from $test_table";
		$result=$mysqli->query($sql);
		//$num=$result->num_rows;
		
		while($row=$result->fetch_array())
		{
			echo "<tr class='datagrid-header-row'>";
			echo "<td bgcolor='beige'>";
			echo $row["uname"];
			echo "</td>";
			$name=$row["uname"];
			$sql1="select * from $test_table where uname='$name'";
			$result1=$mysqli->query($sql1);
			while($row1=$result1->fetch_array())
			{
				if($row1["answer"]==1)
				{echo "<td bgcolor='burlywood'>";
				echo "值班";
				echo "</td>";}
				else
				{echo "<td bgcolor='yellow'>";
				echo "</td>";}
			}
			echo "</tr>";
		}
		 ?>
		 </tbody>

	</table>
 	

 	
</body>
 
	<script type="text/javascript">
		

		/*toolbar:[{ 
text:'增加', 
iconCls:'icon-add', 
handler:addrow 
},{ 
text:'保存', 
iconCls:'icon-save', 
handler:saveall 
},{ 
text:'取消', 
iconCls:'icon-cancel', 
handler:cancelall 
}]*/

		
	</script>
</body>
</html>
		<style type="text/css">td{width: 40px;}
		.datagrid-row-over{
    	background-color:pink;
		}
		.datagrid-header td.datagrid-header-over {
   		 background-color:yellow;
		}
		.datagrid-header-row{background-color:green;}
		</style>
		<?php
		/*$x=$_COOKIE['user'];
	echo "<table border='1' width='1000'>";
	echo "<tr bgcolor='coral'><td colspan='46' align='center'>管理员'$x'你好，以下为所以人的排班</td></tr>";
	echo "<tr bgcolor='coral'><td></td><td colspan='9'>周一</td><td colspan='9'>周二</td><td colspan='9'>周三</td><td colspan='9'>周四</td><td colspan='9'>周五</td></tr>";
	echo "<tr bgcolor='beige'>
	<td>姓名</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
	<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
	<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
	<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
	<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td>
	</tr>";
	
		$sql="select distinct uname from $test_table";
		$result=$mysqli->query($sql);
		//$num=$result->num_rows;
		
		while($row=$result->fetch_array())
		{
			echo "<tr>";
			echo "<td bgcolor='beige'>";
			echo $row["uname"];
			echo "</td>";
			$name=$row["uname"];
			$sql1="select * from $test_table where uname='$name'";
			$result1=$mysqli->query($sql1);
			while($row1=$result1->fetch_array())
			{
				if($row1["answer"]==1)
				{echo "<td bgcolor='burlywood'>";
				echo "值班";
				echo "</td>";}
				else
				{echo "<td bgcolor='yellow'>";
				echo "</td>";}
			}
			echo "</tr>";
		}
		echo "</table><p><p><p><p>\n\n";*/
		$x=$_COOKIE['user'];
	echo "<form method='post' action='shoudong.php' name='form1'>";
	echo "<table border='1' width='1000'class='hovertable'>";
	echo "<thead><tr bgcolor='coral'><td colspan='46' align='center'>管理员'$x'你好，以下为所以人的排班</td></tr></thead>";
	echo "<thead><tr bgcolor='coral'><td></td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td></tr></thead>";
	$temp=0;
	for($i=0;$i<45;$i++)
	{
		if($i%5==0&&$i!=0)
		{
			echo "</tr bgcolor='beige'>";
		}
		if($i%5==0)
		{
			echo "<tr bgcolor='beige'>";
			$x=$i/5+1;
			echo "<td>"."第"."$x"."节"."</td>";
		}
		$m=$i+1;
		$sql="select * from $test_table where quan='$m'";
		$result=$mysqli->query($sql);
		//$num=$result->num_rows;
		echo "<td>";
		
		while($row=$result->fetch_array())
		{
			if($row["answer"]==1)
				{
					$uname=$row["uname"];
					$quan=$row["quan"];
					echo "<input type='checkbox' name='tim[]' value='$uname' class='check1'>";
					echo "<input type='checkbox' name='tim1[]' value='$quan' class='check2' hidden>";
					echo "$uname<br>";//"<input type='text' value='$uname'>";
				}
				$temp++;
		}
		echo "</td>";
	}
	echo "</tr>";
	echo "</table><p><p><p>\n\n";
	echo "<a href='calculate.php'><input type='button' value='自动排班(每人最多排一班)' name='sub' class='btn btn-bubble'></a>";
	echo "<a href='calculate2.php'><input type='button' value='自动排班(每人最多排两班)' name='sub' class='btn btn-bubble'></a><p>";
	//echo "手动输入排班";
	echo "<input type='submit' value='提交手动排班' name='sub' class='btn btn-bubble' /> ";
	echo "</form>";
	}
	}
	?>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
			
			var input = document.getElementsByClassName("check1");
			var xx=document.getElementsByClassName("check2");
			
			
			$(".check1").click(function(){
				for(var i = 0;i<input.length;i++){
			  
			  	if (input[i].checked==true){
			  		xx[i].checked=true;
			  	}
			  	else{xx[i].checked=false;}
			  }
			});
				
		});
		
	</script>
	
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