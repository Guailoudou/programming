<head>
    <title>管理面板|修改密码</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/sha256.js"></script>
</head>
<body>
<div style="display: flex;flex-direction: column;align-items: center;">
<h1>修改密码</h1>
<?php
include("connect.php");
function rendmail($username){
    $sql = "SELECT email FROM login WHERE username='".$username."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $mail = mysqli_fetch_assoc($result);
    return $mail['email'];
}
$email = rendmail($_GET['username']);
if($email=="")$email="未绑定 <a href='email.php'>点我</a>绑定";
echo "<h1>用户名：".$_GET['username']."</h1>邮箱:<b id=email>".$email."</b>";
mysqli_close($connect);
?>  
    <form action='admin.php?type=6' method='post'>
    原密码
    <input type='password' name='old' id="old">
    新密码
    <input type='password' id="new1">
    再输入一次
    <input type='password' name='newpass' id="new2">
    <input type="button" value="获取验证码" id="cd" onclick="sendcode()">
    输入验证码：
    <input type="text" id="cds"/>
    <input type="hidden" name="username" value="<?php echo $_GET['username'];?>">
    <input type='submit' value='提交修改' onclick="return on()">
    <input type='button' value='返回' onclick="JavaScript:history.go(-1);">
    
</form>
</div>
<script type="text/javascript">
function on(){
    var new1 = document.getElementById('new1').value;
    var new2 = document.getElementById('new2').value;
    var bds = /^[a-zA-Z0-9_*.]{4,16}$/;
    if(new1 == new2){
        if(new1.length<=4){
            alert("密码过短");
            return false;
        }
        else if(bds.test(new1))return code();
            else {
                    alert("密码不符合规范，允许包含字母数字最高16位");
                    return false;
                }
    }else{
        alert("2次密码不一样")
        return false;
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="/beta/xxtct/js/jquery-form.js"></script>
</body>