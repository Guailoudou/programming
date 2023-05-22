<?php session_start(); ?>
<head>
    <title>管理面板</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<?php
//error_reporting(0);
include("connect.php");    
function main(){
	if($_SESSION['admin']>=3){
    $sql = "SELECT txt, name, time ,uid ,username FROM ly";
}else{
	$sql = "SELECT txt, name, time ,uid ,username FROM ly WHERE username='".hash("sha256",$_SESSION['username'])."'";
}
    $result = mysqli_query($GLOBALS['connect'], $sql); 
	echo "用户：".$_SESSION['username']." 权限等级：".$_SESSION['admin'];
	echo <<<EOF
	<a href='/' style="margin-left: 15px;">主页</a>
	<a href='login.php?type=3' style="margin-left: 15px;">退出登录</a><br>
	<table border="1">
			<tr>
			<th>UID</th><th>ID</th><th>Time</th><th>内容</th><th>操作</th>
			</tr>
	EOF;
    if (mysqli_num_rows($result) > 0) {
            // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
		    $uid = $row["uid"];
			$name = $row["name"];
			$time = $row["time"];
			$txt = $row["txt"];
			$username = $row['username'];
            echo <<<EOF
			<tr>
			<td id="$uid">$uid</td><td>$name</td><td>$time</td><td>$txt</td>
			<td style="text-align: center;width: 40;"><a href="admin.php?type=1&uid=$uid&username=$username" onclick="javascript:return del()">删除</a><a href="edit.php?uid='$uid'&username='$username'">编辑</a></td>
			</tr>
			EOF;
        }
		echo "</table><div id='ly'></div>";
		if($_SESSION['admin']>=2){
			echo <<<EOF
			<div class="admin">--------------------<br>
			更换音乐 输入网易云ID
			<form method="GET" action="admin.php">
			<input type="text" name="id" placeholder="例:2034742057">
			<input type="hidden" name="type" value="3" >
			<input type="submit" value="更换">
			</form>
			EOF;
	    }
		if($_SESSION['admin']>=3){
			echo <<<EOF
			--------------------<br>权限管理
			<form method="GET" action="admin.php">
			<input type="text" name="username" placeholder="用户名">
			<input type="text" name="admin" placeholder="权限等级">
			<input type="hidden" name="type" value="4" >
			<input type="submit" value="更新">
			</form>
			</div>
			EOF;
		}
    } else {
        echo "还没有留言呢，快来留言吧";
    }
}
//自动登录
function login()
{
	if(@$_COOKIE['login']==1){
		$_SESSION['username'] = $_COOKIE['username'];
		$sql = "SELECT admin FROM login WHERE username='".hash("sha256",$_SESSION['username'])."'";
		$adm = mysqli_query($GLOBALS['connect'], $sql);
		$key = mysqli_fetch_assoc($adm);
		$admin = $key['admin'];
		$_SESSION['admin'] = $admin;
	}
}
login();
if(@$_SESSION['admin']>=1){
main();
}else{
echo <<<EOF
<body onload="csh()">
<div class="container" id="loginui">
	<div class="loginBox">
		<div class="userImage">
			<a href="/"><img style="width: 100%;" src="img/catFace.png" title="回到主页"></a>
		</div>
		<form method="post" action="login.php?type=2">
			<div class="input-wrapper">
				<label>账号:</label>
				<input type="text" name="username" id="luser" placeholder="请输入账号">
			</div>
			<div class="input-wrapper">
				<label>密码:</label>
				<input type="password" name="passworld" id="lpaasword" placeholder="密码">
			</div>
			<input style="display:inline;width:20px;" type="checkbox" id="rem" name="rem" value="on"><label for="rem">保存登录状态30天</label>
			<input type="submit" id="button" onclick="javascript:return login()" value="登录">
		</form>
		<a href="javascript:reg()" style="right:20px">注册</a>
	</div>
</div>
<div class="container" id="regui">
	<div class="loginBox">
		<div class="userImage">
			<a href="/"><img style="width: 100%;" src="img/catFace.png" title="回到主页"></a>
		</div>
		<form method="post" action="login.php?type=1">
			<div class="input-wrapper">
				<label>账号:</label>
				<input type="text" name="username" id="user" placeholder="请输入账号-请一定要记住，忘记后无法找回">
			</div>
			<div class="input-wrapper">
				<label>密码:</label>
				<input type="password" name="passworld" id="password1" placeholder="请输入密码-请一定要记住，忘记后无法找回">
			</div>
			<div class="input-wrapper">
				<label>再输入一次密码:</label>
				<input type="password" id="password2" placeholder="请输入密码">
			</div>
			<input type="submit" id="button" onclick="javascript:return password()" value="注册">
		</form>
		<a href="javascript:csh()" style="right:20px">登录</a>
	</div>
</div>
<script src="js/script.js"></script>
</body>
</html>
EOF;
mysqli_close($connect);
}
?>