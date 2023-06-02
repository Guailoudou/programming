<?php session_start(); ?>
<head>
    <title>管理面板|绑定邮箱</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/sha256.js"></script>
</head>
<body><div style="display: flex;flex-direction: column;align-items: center;"><h1>
    <?php
    echo $_SESSION['username']
    ?></h1>
<form action='admin.php' method='get'>
    输入你的邮箱：
<input type="email" id="email" name="email"/>
<input type="button" value="获取验证码" id="cd" onclick="sendcode()">
    输入验证码：
<input type="text" id="cds"/>
<input type="hidden" name="type" value="5">
<input type="submit" value="绑定" onclick="javascript:return code()">
<input type='button' value='返回' onclick="JavaScript:history.go(-1);">
</form>
</div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="/beta/xxtct/js/jquery-form.js"></script>

</body>

</html>