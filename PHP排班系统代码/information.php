
<?php
header("content-type:text/html;charset=utf-8");
if(!isset($_COOKIE["user"]) or $_COOKIE["user"]=="")
{
	echo "alert('请先登录账号')";
	header("refresh:0;url=login.php");
}
else
{
	?>
	<head design-width="750">
	<script src="js/auto-size.js"></script><!--设置字体大小-->

<script src="js/jquery-2.2.4.min.js"></script><!--设置字体大小-->
	<style type="text/css">
	.btn-bubble {
  color: white;
  background-color: #dc5d41;
  background-repeat: no-repeat;
}
.btn-bubble:hover, .btn-bubble:focus {
  -webkit-animation: bubbles 1s forwards ease-out;
          animation: bubbles 1s forwards ease-out;
  background: radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 90% 90% / 0.88em 0.88em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 23% 141% / 0.81em 0.81em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 17% 90% / 0.68em 0.68em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 15% 94% / 1.12em 1.12em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 42% 126% / 0.86em 0.86em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 102% 120% / 0.58em 0.58em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 12% 121% / 0.67em 0.67em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 69% 87% / 1.18em 1.18em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 32% 99% / 0.79em 0.79em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 84% 129% / 0.79em 0.79em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 40% 99% / 0.72em 0.72em;
  background-color: #dc5d41;
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
  padding: 0.5em 1.5em;
}
		body,p,h1,h2,h3,h4,h5,li,span,i,ul,img,a,strong,input,button,textarea,select,dl,dd,dt{margin:0;padding:0;}
body{font-family:"microsoft yahei","Arial";font-size: 0.24rem;line-height: 1;color:#333;-webkit-user-select:none;-webkit-text-size-adjust: 100% !important; text-size-adjust: 100% !important;-moz-text-size-adjust: 100% !important;}
::-webkit-scrollbar{width: 0;height: 0;}/*滚动条宽高设为0*/
*{-webkit-tap-highlight-color:rgba(0,0,0,0);-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
[class|="ico"]{-webkit-background-size: 100% 100%;background-size: 100% 100%;display: inline-block;vertical-align: middle;}
[class|="icon-"]{font-family:"iconfont" !important;font-size:.24rem !important;font-style:normal;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}
li{list-style-type:none; float:left;}
a{text-decoration:none;color: #333;}
img{border:none;vertical-align: middle;margin-top: 0;}
i,var,em{font-style:normal;}
button{font-family:"microsoft yahei","Arial";outline:none;cursor: pointer;font-size: 0.24rem;border: none;}
iframe{border: none;}
input,select,textarea{outline:none;font-family:"microsoft yahei","Arial";font-size: 0.24rem;border-radius: 0;}
input:disabled{opacity: 1;color:#333;}
input[type="submit"],input[type="reset"],input[type="text"],input[type="password"],input[type="number"],input[type="button"],button,input[type="date"],
textarea{-webkit-appearance: none;border: none;background: #dc5d41;}
textarea{resize:none;}
div{margin:0 auto;}
.fl{float:left;}
.fr{float:right;}
.dt{display: table;width: 100%;}
.fl-w{float: left;width: 100%;}
.clear{clear:both;}
.fixed{z-index: 2;position: fixed;left: 0;bottom: 0;width: 100%;}
.poa{z-index: 1;position: absolute;left: 0;bottom: 0;width: 100%;}
.bgsz{-webkit-background-size: 100% 100%;background-size: 100% 100%;}
.hide{display:none !important;}
.bdn>:last-child{border-bottom: none;}

.mobile-wrap{position: relative;background-color: #f5f5f5;margin-bottom: 1.3rem;}

header{
	width: 100%;
	height: .86rem;
}
header span{
	line-height: .86rem;
	color: #dc5d41;
	margin-left: .2rem;
	font-size: .3rem;
}
main{
	width: 100%;
	display: table;
}

.mobile-wrap-mb{
	margin-bottom: 0;
	background-color: #fff;
}

.inform{
	width: 100%;
	display: table;
}
.inform h3{
	text-align: center;
	font-size: .46rem;
	color: #323233;
	font-weight: normal;
}

.inform-list{
	width: 100%;
	display: table;
}
.inform-list ul{
	width: 100%;
	height: .66rem;
	border-bottom: .05rem solid #d7d7dc;
	margin-top: .45rem;
}
.inform-list ul li{
	width: 33.33%;
	height: .66rem;
	text-align: center;
	line-height: .66rem;
	font-size: .3rem;
	position: absolute;
	border-bottom: .05rem solid #d7d7dc;
	left: 500px;
}
.inform-list ul li:after{
	content: '';
	position: absolute;
	right: 0;
	bottom: -.05rem;
	width: .03rem;
	height: .05rem;
	background-color: #fff;
	z-index: 99;
}
.inform-list ul li:nth-last-child:after{
	border: none;
}
.inform-list ul li.acti{
	border-bottom: .05rem solid #f7505c;
	height: .66rem;
	color: #f7505c;
}

.inform-text{
	width: 100%;
	display: table;
	display: none;
}

.inform .show{
	display: table;
}
.inform-text p{
	width: 5.96rem;
	height: .82rem;
	border: .01rem solid #d7d7dc;
	margin: 0 auto;
	margin-top: .45rem;
}
.inform-text p span{
	display: block;
	width: 1.2rem;
	height: 100%;
	float: left;
	line-height: .82rem;
	margin-left: .2rem;
	color: #afaeb3;
	font-size: .26rem;
}
.inform-text p input{
	width: 3rem;
	height: .5rem;
	line-height: .5rem;
	border: none;
	background: none;
	margin-top: .16rem;
	color: #333;
	font-size: .26rem;
}
.inform-text h4{
	text-align: center;
	width: 100%;
	width: 5.96rem;
	margin: 0 auto;
	display: table;
}
.inform-text h4 input{
	width: 5.96rem;
	height: .82rem;
	border: none;
	background-color: #dc5d41;
	color: #fff;
	margin: 0 auto;
	margin-top: 1rem;
	border-radius: .03rem;
	font-size: .28rem;
}
.inform-text h4 a{
	color: #afaeb3;
	font-size: .28rem;
	font-weight: normal;
	text-align: right;
	float: right;
	line-height: .5rem;
	font-size: .24rem;
}

	
</style>
</head>

	
	
	
	<?php
include "config.php";
 	$name=$_COOKIE["user"];
 	$sql="SELECT admin FROM $test_user WHERE name ='$name'";
 	$result=$mysqli->query($sql);
 	$admin=$result->fetch_array();
 	?>
 	
<?php
	
	echo "<center>";
	$name=$_COOKIE["user"];
	if(!isset($_POST["change"]))
	{


		include "config.php";
		$sql="select * from $test_user where name='$name'";
		$result=$mysqli->query($sql) or die($mysqli->error);
		?>
		
	
												<?php
												while($row=$result->fetch_array())
												{
													echo "<form method='post' action='information.php'>";
												?>
												<div class="inform"> 
													<h3>账号管理</h3>
        						<div class="inform-list">
        						<ul>
        							<li class="acti">个人信息</li>
        				
        							</ul>
        							</div>
        							<div class="inform-text show">
        			<p>
        				<span>
        					姓名 ：
        				</span>
													

													
														<?php echo "<input type='text' name='name1' disabled value=".$row["name"].">";?>
													
												</p>
												<!--个人信息框-->
												<p>
													<span> 电话：</span>

													
														<?php echo "<input type='text' name='tel1' value=".$row["tel"].">";?>
														</p>
													
												

												<p>
													<span>学号：</span> 

													
														<span class="editable" id="age"><?php echo "<input type='text' name='schoolcard1' value=".$row["schoolcard"].">";?></span>
													</p>
												

												<p>
													<span> 部门：</span>

													
														<span class="editable" id="signup"><?php echo "<input type='text' name='partment1' value=".$row["partment"].">";?></span>
													
												</p>

												<br>

												
											<div align="center">
											<?php
											echo "<input type='submit' name='change' value='确认修改信息' class='btn btn-bubble' >";
											?>
											</div>
											</div>
				
					<!-- #section:basics/footer -->
					<div class="footer-content" align="center">
						<span class="bigger-120">
							<span class="blue bolder">Auto</span>
							arrange the schedua &copy; start 2019
						</span>
						
					</div>

					<!-- /section:basics/footer -->
				
			
											
											<?php
										}
										?>
										
		<?php
		
		echo "</form>";
	}
	else
	{
		include "config.php";
		$tel=$_POST["tel1"];
		$schoolcard=$_POST["schoolcard1"];
		$partment=$_POST["partment1"];
		$sql="UPDATE $test_user SET tel='$tel' ,schoolcard='$schoolcard' , partment='$partment' WHERE name='$name'";
		if($result=$mysqli->query($sql) or die($mysqli->error)){
			?>
			<script type="text/javascript">
			alert("修改成功");
			location="information.php";
			</script>
			<?php
			//header("refresh:0;url=index.php");

		}
		else
		{
			?>
			<script type="text/javascript">
				alert("修改失败")
				location="information.php";
			</script>
			<?php
			//header("refresh:0;url=index.php");
		}

	}
}
echo "</center>";
	?>