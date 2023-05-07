<?php session_start(); ?>
<?php
//error_reporting(0);
$servername = "localhost";
$username = "*****";
$password = "*****";
$dbname = "web";
$connect=mysqli_connect($servername, $username, $password, $dbname);//连接数据库
global $connect;
function reg(){
    $sql = "INSERT INTO login (username,password,admin) VALUES ('".hash("sha256",$_POST['username'])."','".hash("sha256",$_POST['passworld'])."',1)";
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('注册成功');history.go(-1);</script>注册成功";
}
function login(){
    $sql = "SELECT password,admin FROM login WHERE username='".hash("sha256",$_POST['username'])."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $key = mysqli_fetch_assoc($result);
    if(hash("sha256",$_POST['passworld'])==$key['password']){
        $_SESSION['admin']=$key['admin'];
        $_SESSION['username']=$_POST['username'];
        @setcookie('login','1',null,'/');
        echo "<script>alert('登录成功');location.href='/';</script>登录成功<br><a href='index.php'>返回</a>";
    }else{
        echo "<script>alert('登录失败，账号或密码错误');history.go(-1);</script>登录失败<br><a href='index.php'>返回</a>";
    }
}
function exit_login(){
    $_SESSION['admin']=0;
    setcookie('login','',time()-3600,'/');
    echo "<script>alert('退出登录成功');location.href='/';</script>退出登录成功<br><a href='index.php'>返回</a>";
}
function regname(){
    $err = 0;
    $sql="SELECT username FROM login";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["username"]==hash("sha256",$_POST['username'])){
               $err = 1; 
               echo "<script>alert('该用户名已经被注册了');location.href='/';</script>";
        }
        }
        if($err!=1)reg();
}
}
if($_GET['type']!=""){
    if($_GET['type']==1){
        regname();
    }elseif($_GET['type']==2){
        login();
    }elseif($_GET['type']==3){
        exit_login();
    }
}
mysqli_close($connect);
?>
