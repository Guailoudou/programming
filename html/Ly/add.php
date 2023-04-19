<?php
//该文件已弃用
error_reporting(0);
if($_POST['txt'] != ""){
    $add = fopen("ly.txt","a");
    fwrite($add,"<a style='font-size: 8px;'>");
    fwrite($add,date("Y/m/d H:i "));
    fwrite($add,$_SERVER['REMOTE_ADDR']);
    fwrite($add," ".$_POST['names']);
    fwrite($add,"</a>"."\r\n");
    fwrite($add,$_POST['txt']."\r\n");
    fclose($add);
    echo "<p class='tit'>留言保存成功</p>";
}else{
    echo "错误，没有收到内容";
}
?>
