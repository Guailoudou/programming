<?php session_start(); ?>
<head>
    <title>管理面板|账号</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div style="display: flex;flex-direction: column;align-items: center;">
<h1>账号信息</h1>
<table border="1">
<tr>
    <th>用户名</th>
    <th>邮箱</th>
    <th>权限等级</th>
    <th>操作</th>
</tr>
<?php
include("connect.php");
//获取用户邮箱
function rendmail($username){
    $sql = "SELECT email FROM login WHERE username='".$username."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $mail = mysqli_fetch_assoc($result);
    return $mail['email'];
}
function main(){
    if($_SESSION['admin']>=3){
        $sql = "SELECT username, admin, email FROM login";
    }else{
        $sql = "SELECT username, admin, email FROM login WHERE username='".$_SESSION['username']."'";
    }
    $result = mysqli_query($GLOBALS['connect'], $sql); 
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            $email = $row["email"];
            $admin = $row["admin"];
            $username = $row['username'];
            $url = "changepass.php?username=".$username;
            if($email=="")$email="未绑定 <a href='email.php'>点我</a>绑定";
            echo <<<EOF
            <tr>
            <td>$username</td><td>$email</td><td>$admin</td><td><a href="$url">修改密码</a></td>
            </tr>
            EOF;
        }
    }
}
if($_SESSION['admin']>=1){
    main();
}
?>
<div id="end"></div>
</table>
<a href="#end" title="回到底部"><div class="fixed">
<i class="bi bi-arrow-down"></i>
</div></a>
</div> 
<a href="" title="刷新"><div class="fixed3">
<i class="bi bi-arrow-clockwise"></i>
</div></a>
<a href="javascript:history.go(-1);" title="点我返回"><div class="fixed2">
<i class="bi bi-arrow-return-left"></i>
</div></a>
</div>