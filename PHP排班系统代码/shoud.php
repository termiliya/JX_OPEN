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
	//include "kuangjia.php";
	echo "<center>";
	?>
	<meta charset="UTF-8">
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
	<form method="post" action="end_table.php" name="form1">
		 <table class="hovertable">
			<thead>
			<tr>
				<td></td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td>
			</tr>
			</thead>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第一节</td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第二节</td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第三节</td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>			
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第四节</td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第五节</td>
				
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第六节</td>
				
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第七节</td>
				
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#F5FAFA';">
				<td>第八节</td>
				
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
			<tr onmouseover="this.style.backgroundColor='#B7D2FF';" onmouseout="this.style.backgroundColor='#fff';">
				<td>第九节</td>
				
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
				<td><input type="text" name="tim[]" value=""></td>
			</tr>
		</table>
		<input type="submit" value="提交排班" name="sub" class="btn btn-bubble"/>
		<!--<input type="button" value="返回主界面" id="back1"/>-->
		</form>
		<script type="text/javascript">
		/*	function altRows(id){
    if(document.getElementsByTagName){  
        
        var table = document.getElementById(id);  
        var rows = table.getElementsByTagName("tr"); 
         
        for(i = 0; i < rows.length; i++){          
            if(i % 2 == 0){
                rows[i].className = "evenrowcolor";
            }else{
                rows[i].className = "oddrowcolor";
            }      
        }
    }
}

window.onload=function(){
    altRows('alternatecolor');
}*/
		</script>

		
					<!-- #section:basics/footer -->
					<div>
						<span class="bigger-120">
							<span class="blue bolder">Auto</span>
							arrange the schedua &copy; start 2019
						</span>
					</div>

						&nbsp; &nbsp;
						
		<?php
	}
	echo "<center>";
	?>