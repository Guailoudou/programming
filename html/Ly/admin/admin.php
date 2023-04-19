<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "***";
$password = "***";
$dbname = "web";
$connect=mysqli_connect($servername, $username, $password, $dbname);//连接数据库
global $connect,$connect2;
function del(){
        $sql = "DELETE FROM ly WHERE uid=".$_GET['uid'];
        if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('删除成功');history.go(-1);</script>删除成功<br><a href='index.php'>返回</a>";
    }
function up(){
    $sql = "UPDATE ly SET name='".$_GET['name']."',txt='".$_GET['txt']."' WHERE uid=".$_GET['uid'];
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('编辑成功');history.go(-1);</script>编辑成功<br><a href='index.php'>返回</a>";
}
function music(){
    $sql = "UPDATE music SET id=".$_GET['id'];
    if(mysqli_query($GLOBALS['connect'], $sql))echo "<script>alert('音乐更换成功');history.go(-1);</script>音乐更换成功<br><a href='index.php'>返回</a>";
}
if($_GET['type'] != ""){
    if($_SESSION['admin']>=1){
    if($_GET['type']==1){
        if($_SESSION['admin']>=3)del();
        if($_SESSION['admin']<3){
            if(hash("sha256",$_SESSION['username'])==$_GET['username']){
                del();
            }else echo "<script>alert('权限不足,你无权删除这个文本');history.go(-1);</script>权限不足";
        }
    }
    elseif($_GET['type'] == 2){
        if($_SESSION['admin']>=3)up();
        if($_SESSION['admin']<3){
            if(hash("sha256",$_SESSION['username'])==$_GET['username']){
                up();
            }else echo "<script>alert('权限不足,你无权编辑这个文本');history.go(-1);</script>权限不足";
        }
    }
    elseif($_GET['type'] == 3&&$_SESSION['admin']>=2){
        music();
    }
    mysqli_close($connect);
    }else echo "<script>alert('权限不足');history.go(-1);</script>权限不足";
}else{
    echo "type:<br>1--del.uid<br>2--up.uid-txt<br>3--music-id<br><a href='/'>回到首页</a>";
}
?>
