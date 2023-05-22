<head>
    <title>管理面板</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div style="display: flex;flex-direction: column;align-items: center;">
<h1>编辑面板</h1>
<?php
include("connect.php");
function get(){
    $sql = "SELECT txt, name FROM ly WHERE uid=" . $_GET['uid'];
    $result = mysqli_query($GLOBALS['connect'], $sql);
    $lif = mysqli_fetch_assoc($result);
    $ordtxt = $lif['txt'];
    $ordname = $lif['name'];
    echo "<form action='admin.php' method='get'>用户名<br>";
    echo "<textarea rows='1' cols='40' autocomplete='off' maxlength='12' name='name' >".$ordname."</textarea><br>文本内容<br>";
    echo "<textarea rows='10' cols='40' autocomplete='off' maxlength='300' name='txt'>".$ordtxt."</textarea>";
    echo "<input type='hidden' name='username' value=".$_GET['username'].">";
    echo "<input type='hidden' name='uid' value=".$_GET['uid'].">";
}
get();
mysqli_close($connect);
?>
    <input type="hidden" name="type" value="2">
    <input type='submit' value='提交修改'>
    <input type='button' value='返回' onclick="JavaScript:history.go(-1);">
    
</form>
</div>
</body>