<?php
//最终的输出到所有人de排班
header("content-type:text/html;charset=utf-8");
if(!isset($_COOKIE["user"])||$_COOKIE["user"]=="")
{
	?>
	<script type="text/javascript">
	alert("您没有登录");
	</script>
	 <?php
	// echo "您没有登录";
	header("refresh:0;url=login.php");
}
else
{
	?>
<html>

	<head>
		<title>auto-arrange主页面</title>
		<meta charset="UTF-8" />
		<!--引入主题样式-->
		<link rel="stylesheet" type="text/css" href="themes/default/easyui.css" />
		<!--引入图标样式-->
		<link rel="stylesheet" type="text/css" href="themes/icon.css" />
		<!--引入jQuery文件-->
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<!--引入EasyUi的js文件-->
		<script src="js/jquery.easyui.min.js" type="text/javascript" charset="utf-8"></script>
		<!--
			主页面:
				1 引入EasyUI插件
				2 使用body布局方式
				3 将布局后的每块区域完成内容填充
			
			
		-->
		<style type="text/css">
			#sdiv {
				text-align: center;
				font-size: 14px;
				font-weight: bold;
				line-height: 30px;
				background-color: gray;
			}
			/*修改头部标题样式*/
			
			#n_title {
				color: white;
				font-size: 14px;
				line-height: 40px;
			}
			/*修改标题超链接样式*/
			
			#n_title a {
				text-decoration: none;
				color: white;
			}
			
			#n_title a:hover {
				color: orange;
			}
			/*修改密码样式*/
			
			#div_pwd table {
				margin: auto;
				margin-top: 10px;
			}
			
			#div_pwd table tr {
				height: 40px;
				text-align: center;
			}
		</style>
		<!--声明js代码域-->
		<script type="text/javascript">
			/*网页js功能*/
			$(function() {
				//退出功能
				$("#n_title_out").click(function() {
						//提示用户是否确定退出
						$.messager.confirm("确认对话框", "你真的要退出吗？", function(r) {
							//退出
							if (r) {

								window.location.href = "exit.php";
							}
						})
					})
					//修改密码
				$("#n_title_pwd").click(function() {
						//打开修改密码窗口
						$("#div_pwd").window("open");
					})
			//确认修改密码
				$("#btnCon").click(function() {
					//校验原有密码
					if ($(":password:eq(0)").val() == "") {
						$.messager.alert("原有密码", "原有密码不能为空！", "warning");
					} else if ($(":password:eq(1)").val() == "") {
						//校验新密码
						$.messager.alert("新密码", "新密码不能为空！", "warning");
					} else if ($(":password:eq(2)").val() == "") {
						//校验确认密码
						$.messager.alert("确认密码", "确认密码不能为空！", "warning");
					} else if ($(":password:eq(1)").val() != $(":password:eq(2)").val()) {
						//校验两次密码
						$.messager.alert("密码校验", "两次密码不一致！", "error");
					} else {
						//$user1=_COOKIE["user"];
						//$new_pass1=$(":password:eq(2)").val();
						//<?php
						
						//include "config.php";
						//$sql="UPDATE $test_user SET pass=$new_pass WHERE name=$user AND pass=$new_pass";
						//$result=$mysqli->query($sql);
						//if($result)
						//?>
						//关闭密码窗口
						//header("refresh:0;url=edit_pass.php");
						//window.open("edit_pass.php");
						$("#div_pwd").window("close");
						//$.messager.alert("密码修改","密码修改成功！","info");
						$.messager.show({
							title: '密码修改',
							msg: '密码修改成功，新密码为:'+$(":password:eq(2)").val(),
							timeout: 3000,
							showType: 'slide'
						});
						
						
					}
				})
			//取消密码修改
				$("#btnCan").click(function(){
					$("#div_pwd").window("close");
				})
			//树状菜单和选项卡的联动
				//给菜单添加单击事件
				$("#treeMenu").tree({
					onClick:function(node){
						//控制台打印node内容
							//console.log(node);
						//获取attributes属性,判断是菜单还是菜单描述
						var attrs=node.attributes;
						if(attrs==null || attrs.url==null){
							return;
						}
						//判断选项卡是否存在
						var has=$("#div_tabs").tabs("exists",node.text);
						if(has){
							//选中存在的选项卡
							$("#div_tabs").tabs("select",node.text);
						}else{
							//创建新的选项卡面板
							$("#div_tabs").tabs("add",{
								title:node.text,
								closable:true,
								content:"<iframe src="+attrs.url+" style='width:100%;height:98%' frameborder='0'/>"
							})
						}
						
						
					}
				})
				
				
				
			})
			/*
			 	Json数据格式
			 		{"键名":"值","键名":"值",...........}
			 		
			 		{
			 			"键名":"值",
			 			"键名":"值",
			 			...........
			 		}
			 * 
			 * 
			 * */
		</script>
	</head>

	<body class="easyui-layout">
		<!--布局：北-->
		<div data-options="region:'north'" style="height: 50%;background-image: url(img/layout-browser-hd-bg.gif);">
			<!--添加网站Logo-->
			<span id="n_logo" style="margin-left: 20px;">
				<img src="img/blocks.gif" width="35px" style="margin-top: 5px;"/>
				<font color="white" size="4px">排班系统</font>
			</span>
			<span id="n_title" style="float: right;">
				
				欢迎 <?php echo $_COOKIE["user"];?>&nbsp;&nbsp;&nbsp;
				<a id="n_title_pwd" href="javascript:void(0)">修改密码</a>|
				<a id="n_title_out" href="javascript:void(0)">退出</a>
			</span>
		</div>
		<!--布局：南-->
		<div id="sdiv" data-options="region:'south',border:false" style="height:35%;">
			&copy;Auto arrange the schedua &copy; start 2019
		</div>
		<!--布局：西-->
		<div data-options="region:'west',title:'系统菜单',split:true" style="width: 200px;">
			<!--分类效果实现-->
			<div class="easyui-accordion" data-options="fit:true,border:false">
				
				<div id="" title="选项" >
					<!--创建菜单-->
					<ul id="treeMenu" class="easyui-tree">
						<li>
							<?php
							 include "config.php";
							 $name=$_COOKIE["user"];
							 $sql="SELECT admin FROM $test_user WHERE name ='$name'";
							 $result=$mysqli->query($sql);
							 $admin=$result->fetch_array();
							 if($admin[0]==0) {
							 	?>
							 <span>用户选项</span>
							<ul>
								<li data-options="attributes:{url:'add_table.php'}">提交排班</li>
								<li data-options="attributes:{url:'last_table.php'}">上次提交</li>
								<li data-options="attributes:{url:'end_print.php'}">最终排班</li>
							</ul>
								<li>
							<span>个人信息</span>
						<ul>
							<li data-options="attributes:{url:'information.php'}">个人信息</li>
						
						</ul>
						</li>
						<li>
							<span>系统信息</span>
						<ul>
							
						<li data-options="attributes:{url:'useful1.html'}">使用说明</li>
						</ul>
						</li>
						 <?php } else{ ?>
							<span>管理员选项</span>
							<!--二级-->
							<ul>
								<li data-options="attributes:{url:'addadmin.php'}">权限管理</li>
								<li data-options="attributes:{url:'show_all.php'}">查看所有提交的排班</li>
								<li data-options="attributes:{url:'manageadmin.php'}">成员账号管理</li>
								<li data-options="attributes:{url:'end_print.php'}">最终排班</li>
								<li data-options="attributes:{url:'calculate2.php'}">自动排班</li>
								<li data-options="attributes:{url:'shoud.php'}">手动排班</li>
							</ul>
								<li>
							<span>个人信息</span>
						<ul>
							<li data-options="attributes:{url:'information.php'}">个人信息</li>
						
						</ul>
						</li>
						<li>
							<span>系统信息</span>
						<ul>
							
						<li data-options="attributes:{url:'useful1.html'}">使用说明</li>
						</ul>
						</li>
								<?php } ?>
							
						
						</li>
						
					</ul>
				</div>
			<div id="" title="个人信息" ><ul id="treeMenu" class="easyui-tree"></ul></div>
			<div id="" title="系统信息" ><ul id="treeMenu" class="easyui-tree"></ul></div>
			</div>

			
		</div>
		<!--布局：中间-->
		<div data-options="region:'center'">
			<!--选项卡使用-->
			<div id="div_tabs" class="easyui-tabs" data-options="fit:true,border:false">
				<!--首页-->
				<div id="" title="首页" style="background-image:url(img/body.png) ;background-size: cover;">
					
				</div>
			</div>
		</div>
		<!--创建修改密码窗口-->
		
		<div id="div_pwd" class="easyui-window" title="修改密码" style="width: 400px;height: 250px;" data-options="collapsible:false,minimizable:false,maximizable:false,closed:true,modal:true ">
			<form action="edit_pass.php" method="post">
			<table>
				<tr>
					<td>原有密码:</td>
					<td>
						<input type="password" name="pass"/>
					</td>
				</tr>
				<tr>
					<td>新密码:</td>
					<td>
						<input type="password" name="pass1"/>
					</td>
				</tr>
				<tr>
					<td>确认密码:</td>
					<td>
						<input type="password" name="pass2"/>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						
						<!--<a id="btnCon" href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save'"></a>--><input type="submit" name="" value="确认修改"> &nbsp;&nbsp;&nbsp;&nbsp;
						<a id="btnCan" href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'">取消</a>
					</td>
				</tr>
			</table>
			</form>
		</div>

	</body>

</html>
<?php
}
?>