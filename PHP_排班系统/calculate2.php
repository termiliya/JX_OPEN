<?php
//手动排班的结果
header("content-type:text/html;charset=utf-8");
if(!isset($_COOKIE["user"]))
{
	?>
	<script type="text/javascript">
	alert("您没有登录");
	</script>
	 <?php
	//header("refresh:0;url=index.php");
}
else
{
	include "config.php";
	$sql="select * from $test_user where admin='0' ";
	$result=$mysqli->query($sql) or die($mysqli->error);
	//$arrayName=array();
	//$num=$result->num_rows;
	$arrayxy=array();
	$j=0;
	while($row=$result->fetch_array())
	{
        $temp=$row['name'];
		$sql1="select * from $test_table where uname='$temp'";
		$result1=$mysqli->query($sql1) or die($mysqli->error);
		$ij=0;
		$arrayx=array();
		while($row1=$result1->fetch_array())
		{
			$a[$ij]=$row1['answer'];
			array_push($arrayx,$a[$ij]);
			$ij++;
		}
		//array($row['name'] =>array($a[0],));
		//$arrayName=array($temp=>);
		//$arrayxy=array("$temp"=>$arrayx);
		//$arrayxyz=$arrayxy;
		//print_r($arrayxy); 
		array_push($arrayxy,$arrayx);
		$j++;
	}
	//print_r($arrayxy);
	for($i=0;$i<$ij;$i++)//列
		{
			for($m=0;$m<$j;$m++)//行
			{
				$newarrayxy[$m][$i]=$arrayxy[$m][$i];
				$newuser[$m][$i]=0;
			}
		}
	$sql5="delete from end_table";
	$result5=$mysqli->query($sql5) or die($mysqli->error);
		
		
	digui($ij,$j,$newarrayxy,$newuser);
	

	for($z=0;$z<$ij;$z++){//列
		$sum=0;
		$i=0;
		$m=$z+1;
		$sql2="select * from $test_user where admin='0' ";
		$result2=$mysqli->query($sql2) or die($mysqli->error);
		while($row=$result2->fetch_array()){
			if($newuser[$i][$z]==1)
		{
			$uname=$row['name'];
			$sql3="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','$uname',1,'$m')";
  			$result3=$mysqli->query($sql3) or die($mysqli->error);
		}
		$sum=$sum+$newuser[$i][$z];
		$i++;
	}
	/*if($sum==0)
		{
			
			$sql4="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','',0,'$m')";
			$result4=$mysqli->query($sql4) or die($mysqli->error);
		}*/
	}

	
	//一人排两班
	for($i=0;$i<$ij;$i++)//列
		{
			for($m=0;$m<$j;$m++)//行
			{
				$newarrayxy2[$m][$i]=$arrayxy[$m][$i];
				$newuser2[$m][$i]=0;
			}
		}
		for($i=0;$i<$ij;$i++)//列
		{
			for($m=0;$m<$j;$m++)//行
			{
					if($newuser[$m][$i]==1)
								{
									for($t1=0;$t1<$j;$t1++)
									{$newarrayxy2[$t1][$i]=0;}
								}
			}
		}
		
	digui($ij,$j,$newarrayxy2,$newuser2);
	




	

	//第二个表
	for($z=0;$z<$ij;$z++){//列
		$sum=0;
		$i=0;
		$m=$z+1;
		$sql2="select * from $test_user where admin='0' ";
		$result2=$mysqli->query($sql2) or die($mysqli->error);
		while($row=$result2->fetch_array()){
			if($newuser2[$i][$z]==1)
		{
			$uname=$row['name'];
			$sql3="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','$uname',1,'$m')";
  			$result3=$mysqli->query($sql3) or die($mysqli->error);
		}
		$sum=$sum+$newuser2[$i][$z];
		$i++;
	}
	/*if($sum==0)
		{
			
			$sql4="INSERT INTO $end_table(content,uname,answer,quan) VALUES('$m','',0,'$m')";
			$result4=$mysqli->query($sql4) or die($mysqli->error);
		}*/
	}

?>
	<script type="text/javascript">
	alert("自动排班成功");
	</script>
	 <?php
	 header("refresh:0;url=end_print.php");

}


class min
	{
		public $row=0, $col=0,$sum=0;
	}
function digui($ij,$j,&$newarrayxy,&$newuser){
	$min=new min();
		$min->sum=$j+1;
		for($i=0;$i<$ij;$i++)//列45
		{
			$sum=0;
			
			for($m=0;$m<$j;$m++)//行
			{
				$sum+=$newarrayxy[$m][$i];
				//if($sum==1){$temp1=$m;$temp2=$i;}
			}
			if($min->sum>$sum&&$sum>0){
				$min->sum=$sum;
				for($x=0;$x<$j;$x++){
					if($newarrayxy[$x][$i]==1)
				{$min->row=$x;$min->col=$i;}
		           }
			}
		}

		
		if($min->sum>=1&&$min->sum<=$j)
		{
			$newuser[$min->row][$min->col]=1;
			//$newarrayxy[$min->row()][$min->col()]=1;
			$temp1=0;$temp2=0;
			for($temp1=0;$temp1<$j;$temp1++)$newarrayxy[$temp1][$min->col]=0;
		    for($temp2=0;$temp2<$ij;$temp2++)$newarrayxy[$min->row][$temp2]=0;
		    	digui($ij,$j,$newarrayxy,$newuser);
		}
		else
			return 0;
}//function每人最多一班的排法






