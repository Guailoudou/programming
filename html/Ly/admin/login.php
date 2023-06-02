<?php session_start(); ?>
<?php
//error_reporting(0);
include("connect.php");
function reg(){
    $sql = "INSERT INTO login (username,password,admin,email) VALUES ('".$_POST['username']."','".hash("sha256",$_POST['passworld'])."',1,'".strtolower($_POST['email'])."')";
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('注册成功');history.go(-1);</script>注册成功";
}
function login(){
    $sql = "SELECT password,admin FROM login WHERE username='".$_POST['username']."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $key = mysqli_fetch_assoc($result);
    if($_POST['rem']=="on")$time = time()+3600*24*30; //30天
    else $time = null;
    if(hash("sha256",$_POST['passworld'])==$key['password']){
        $_SESSION['admin']=$key['admin'];
        $_SESSION['username']=$_POST['username'];
        @setcookie('login','1',$time,'/');
        @setcookie('username',$_POST['username'],$time,'/');
        echo "<script>alert('登录成功');location.href='/';</script>登录成功<br><a href='index.php'>返回</a>";
    }else{
        echo "<script>alert('登录失败，账号或密码错误.由于数据库结构升级.老账号请勾上升级，下次登录即可直接登录');history.go(-1);</script>登录失败<br><a href='index.php'>返回</a>";
    }
}
function exit_login(){
    $_SESSION['admin']=0;
    setcookie('login','',time()-3600,'/');
    setcookie('username','',time()-3600,'/');
    echo "<script>alert('退出登录成功');location.href='/';</script>退出登录成功<br><a href='index.php'>返回</a>";
}
function regname(){
    $err = 0;
    $sql="SELECT username FROM login";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["username"]==$_POST['username']){
               $err = 1; 
               echo "<script>alert('该用户名已经被注册了');history.go(-1);</script>";
        }
        }
        if($err!=1)regemail();
    }
}
function regemail(){
    $err = 0;
    $sql="SELECT email FROM login";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            if (strtolower($row["email"])==strtolower($_POST['email'])){
               $err = 1; 
               echo "<script>alert('该邮箱已经被注册了');history.go(-1);</script>";
        }
        }
        if($err!=1)reg();
    }
}
function replace(){
    $name = $_POST['username'];
    $sql = "UPDATE login SET username='".$name."' WHERE username='".hash("sha256",$name)."'";
    $sql2 = "UPDATE ly SET username='".$name."' WHERE username='".hash("sha256",$name)."'";
    if(mysqli_query($GLOBALS['connect'],$sql)&&mysqli_query($GLOBALS['connect'],$sql2))login();
}
if($_GET['type']!=""){
    if($_GET['type']==1){
        regname();
    }elseif($_GET['type']==2){
        if($_POST['upacc']=="on"){
            replace();
        }else{
            login();
        }
        
    }elseif($_GET['type']==3){
        exit_login();
    }
}
mysqli_close($connect);
?>