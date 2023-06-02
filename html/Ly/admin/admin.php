<?php session_start(); ?>
<?php
include("connect.php");
//删除留言
function del(){
    $sql = "DELETE FROM ly WHERE uid=".$_GET['uid'];
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('删除成功');history.go(-1);</script>删除成功<br><a href='index.php'>返回</a>";
}
//修改内容
function up(){
    $sql = "UPDATE ly SET name='".$_GET['name']."',txt='".$_GET['txt']."' WHERE uid=".$_GET['uid'];
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('编辑成功');history.go(-2);</script>编辑成功<br><a href='index.php'>返回</a>";
}
//修改查看页面的音乐
function music(){
    $sql = "UPDATE music SET id=".$_GET['id'];
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('音乐更换成功');history.go(-1);;</script>音乐更换成功<br><a href='index.php'>返回</a>";
}
//修改用户权限等级
function upadmin(){
    $sql = "UPDATE login SET admin='".$_GET['admin']."' WHERE username='".$_GET['username']."'";
    if(mysqli_query($GLOBALS['connect'],$sql))echo "<script>alert('权限更新成功');history.go(-1);</script>权限更新成功<br><a href='index.php'>返回</a>";
}
//设置用户邮箱
function setmail(){
    $sql = "UPDATE login SET email='".strtolower($_GET['email'])."' WHERE username='".$_SESSION['username']."'";
    if(mysqli_query($GLOBALS['connect'],$sql))echo "<script>alert('邮箱添加成功');history.go(-2);</script>邮箱添加成功<br><a href='index.php'>返回</a>";
}
//获取用户的邮箱
function rendmail(){
    $sql = "SELECT email FROM login WHERE username='".$_SESSION['username']."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $mail = mysqli_fetch_assoc($result);
    return $mail['email'];
}
//检查邮箱有没有被使用
function regemail(){
    $err = 0;
    $sql="SELECT email FROM login";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            if (strtolower($row["email"])==strtolower($_GET['email'])){
               $err = 1; 
               echo "<script>alert('该邮箱已经被注册了');history.go(-1);</script>";
        }
        }
        if($err!=1)setmail();
    }
}
//验证密码正确性
function Vpass(){
    $sql = "SELECT password FROM login WHERE username='".$_POST['username']."'";
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $oldpaa = mysqli_fetch_assoc($result);
    if($oldpaa['password'] == hash("sha256",$_POST['old']))uppass();
    else echo "<script>alert('老密码不正确');history.go(-1);</script>";
}
function uppass(){
    $sql = "UPDATE login SET password='".hash("sha256",$_POST['newpass'])."' WHERE username='".$_POST['username']."'";
    if(mysqli_query($GLOBALS['connect'],$sql))echo "<script>alert('密码修改成功');history.go(-2);</script>";
}
//主体
if(@$_GET['type'] != ""){
    if($_SESSION['admin']>=1){
    switch($_GET['type']){
        //删除功能
        case 1:
            if($_SESSION['admin']>=3)del();
            if($_SESSION['admin']<3){
                if($_SESSION['username']==$_GET['username']){
                    del();
                }else echo "<script>alert('权限不足,你无权删除这个文本');history.go(-1);</script>权限不足";
            }
            break;
        //编辑功能
        case 2:
            if($_SESSION['admin']>=3)up();
            if($_SESSION['admin']<3){
                if($_SESSION['username'] == $_GET['username']){
                    up();
                }else echo "<script>alert('权限不足,你无权编辑这个文本');history.go(-1);</script>权限不足";
            }
            break;
        //修改音乐功能
        case 3:
            if($_SESSION['admin']>=2)music();
            break;
        //修改管理员权限功能
        case 4:
            if($_SESSION['admin']>=3)upadmin();
            break;
        //老用户绑定邮箱功能
        case 5:
            if($_SESSION['admin']>=1 && rendmail() == "")regemail();
            else echo "<script>alert('你已经绑定邮箱了，暂时无法换绑 或 未登录');history.go(-2);</script>你已经绑定邮箱了";
            break;
        //修改密码功能
        case 6:
            if($_SESSION['admin']>=3)uppass();
            if($_SESSION['admin']>=1){
                if($_SESSION['username']==$_POST['username']){
                    Vpass();
                }else echo "<script>alert('权限不足');history.go(-1);</script>权限不足";
            }
            break;
    }
    mysqli_close($connect);
    }else echo "<script>alert('未登录，请登录');location.href='/ly/admin';</script>请登录";
}else{
    echo "type:<br>1--del.uid<br>2--up.uid-txt<br>3--music-id<br><a href='/'>回到首页</a>";
}
?>