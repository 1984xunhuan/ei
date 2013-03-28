<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login System</title>
<link rel="stylesheet" style="text/css" href="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/css/web.css" />
	
<script type="text/javascript">
<!--
function register_ui()
{	
	//window.open('<?php echo $this->data->base_url; ?>/index.php?UserAction/display_web_register_ui')
	showModalDialog('<?php echo $this->data->base_url; ?>/index.php?UserAction/display_web_register_ui','用户注册','dialogWidth:360px;dialogHeight:180px;dialogLeft:200px;dialogTop:150px;center:yes;help:yes;resizable:yes;status:yes')

}
-->
</script>
</head>

<body>

	<center>
		<form action="<?php echo $this->data->base_url; ?>/index.php?UserAction/web_login_system" method="POST">
			<table>
				<tr>
					<td>用户名 &nbsp;&nbsp;<input type="text" name="user_name" class="input_text" />
					</td>
				</tr>
				<tr>
					<td>密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;<input type="password" name="user_password" class="input_text" />
					</td>
				</tr>
				<tr>
				     <!-- 
					<td><input type="submit" value="登录" /> <input type="reset"
						value="重置" />&nbsp;&nbsp;<a onclick="register_ui()" href="#">注册</a></td>
				      -->
				      <td><input type="submit" value="登录" /> <input type="reset"
						value="重置" />&nbsp;&nbsp;<a href="<?php echo $this->data->base_url; ?>/index.php?UserAction/display_web_register_ui">注册</a></td>
				</tr>
			</table>
		</form>
	</center>

</body>
</html>