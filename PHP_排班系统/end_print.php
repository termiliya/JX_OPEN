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
//最终的输出到所有人de排班
header("content-type:text/html;charset=utf-8");
if(!isset($_COOKIE["user"]))
{
	?>
	<script type="text/javascript">
	alert("您没有登录");
	</script>
	 <?php
	 echo "您没有登录";
	//header("refresh:0;url=index.php");
}
else
{
	
	echo "<center>";
	include "config.php";
	$sql="select * from $end_table";
	$result=$mysqli->query($sql) or die ($mysqli->error);
	$num=$result->num_rows;
	if($num==0)
	{
		?>
	<script type="text/javascript">
	alert("系统没有最终排班");
	</script>
	 <?php
	echo "系统没有最终排班";	
	}
	else
	{
		?><div><?php
		echo "最终排班如下";
		while($result->fetch_array())
		{
		echo "<table border='3' width='1000' height='400'   bordercolor='beige'  class='hovertable'>";
	echo "<thead><tr bgcolor='aliceblue'><td></td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td></tr></thead>";
	for($i=0;$i<45;$i++)
	{
		if($i%5==0&&$i!=0)
		{
			echo "</tr>";
		}
		if($i%5==0)
		{
			echo "<tr>";
			$x=$i/5+1;
			echo "<td>"."第"."$x"."节"."</td>";
		}
		$m=$i+1;
		$sql="select * from $end_table where quan='$m'";
		$result=$mysqli->query($sql);
		//$num=$result->num_rows;
		echo "<td  bgcolor='blanchedalmond'>";
		while($row=$result->fetch_array())
		{
			if($row["answer"]==1)
				{
					$uname=$row["uname"];
					echo "$uname<br>";//"<input type='text' value='$uname'>";
				}
		}
		echo "</td>";
	}
	echo "</tr>";
	echo "</table>";
		}
		
	}	
}

?><div class="footer">
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
			</div><?php
echo "<center>";


?>