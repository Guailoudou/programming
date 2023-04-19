<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "qwertyuiop";
$dbname = "web";
$connect=mysqli_connect($servername, $username, $password, $dbname);//连接数据库
global $connect;

function main(){
    if($_SESSION['admin']>=1){
    $username = $_SESSION['username'];
}else $username = "guailoudou";
        $sql2 = "SELECT uid FROM uuid";
        $result = mysqli_query($GLOBALS['connect'], $sql2);
        $uuid = mysqli_fetch_assoc($result);
        $uid = $uuid['uid'];
        $sql = "INSERT INTO ly (uid, name, txt, time,username) VALUES ('".$uid."','".$_POST['names']."','".$_POST['txt']."','".date('Y-m-d H:i:s')."','".hash("sha256",$username)."')";
        if(mysqli_query($GLOBALS['connect'], $sql))echo "<p class='tit'>留言保存成功</p>";;//运行数据库指令
        $sql3 = "UPDATE uuid SET uid=".$uid+1; //把记录uid值+1
        if(mysqli_query($GLOBALS['connect'], $sql3))echo "<a href='javascript:redo()'>点我继续留言</a>";
    }
if($_POST['txt'] != ""){
    main();
    mysqli_close($connect);
}else{
    echo "错误，没有收到内容";
}
?>
