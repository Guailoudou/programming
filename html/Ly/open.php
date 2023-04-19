<?--这是过期的文件--?>
<!DOCTYPE html>
<head>
    <title>查看留言</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/tp/minecraft-creeper-face.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <style>
div.fixed {
  position: fixed;
  bottom: 25px;
  right: 25px;
  width: 30px;
  height: 30px;
  border-radius: 5px;
  border: 3px solid #73AD21;
}
div.fixed2 {
  position: fixed;
  bottom: 25px;
  right: 80px;
  width: 30px;
  height: 30px;
  border-radius: 5px;
  border: 3px solid #73AD21;
}
div.fixed3 {
  position: fixed;
  bottom: 80px;
  right: 25px;
  width: 30px;
  height: 30px;
  border-radius: 5px;
  border: 3px solid #73AD21;
}
.bc{
    margin-top: 35px;
    background-color: rgba(240, 248, 255, 0.562);
    background-size: cover;
    border-radius: 10px;
    max-width: 620px;
    width:100%;
    text-align: center;
    margin: auto;
}
div:hover.cd{
  position: fixed;
  overflow: hidden;
  height: 76px;
  width: 320px;
  opacity: 1;
}
div.cd{
  position: fixed;
  overflow: hidden;
  height: 76px;
  width: 76px;
  opacity: 0.6;
}
img{
  width: 80%;
}
</style>
<link rel="stylesheet" href="/fill/css/style.css">
</head>
<body style="text-align: center;">
<div class="cd">
<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=4010229&auto=1&height=66"></iframe>
</div>
<div class="bc">

<?php
$file = fopen("ly.txt", "r") or exit("无法打开文件!");
// 读取文件每一行，直到文件结尾
echo "<h2><i class='material-icons'>sms</i>留言记录~</h2><br>";
while(!feof($file))
{
    echo fgets($file), "<br>";
}
fclose($file);
echo "<h2><a id='end'>-----~到这里就结束了呢~-----</a></h2><br>";
?>
</div> 
<div class="fixed"><a href="#end" title="回到底部">
<i class="material-icons">arrow_downward</i></a>
</div>
</div> 
<div class="fixed3"><a href="" title="刷新">
<i class="material-icons">refresh</i></a>
</div>
<div class="fixed2"><a href="/" title="点我返回">
<i class="material-icons">subdirectory_arrow_left</i></a>
</div>
</body>
