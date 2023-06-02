function del() {
    var msg = "您确定要删除该内容吗？";
    if (confirm(msg) == true) {
        return true;
    } else {
        return false;
    }
} 
function password(){
    var user = document.getElementById('user').value;
    var pass1 = document.getElementById('password1').value;
    var pass2 = document.getElementById('password2').value;
var bds = /^[a-zA-Z0-9_*.]{4,16}$/;
    if(pass1 != pass2){
        alert("2次输入的密码不一样嘞，再检查一下");
        return false;
    } else if(pass1 == ""){
        alert("密码嘞？");
        return false;
    } else if(user == ""){
        alert("账户嘞？");
        return false;
    } else if(user.length<4){
        alert("账户名太短了吧");
        return false;
    } else if(pass1.length<=4){
        alert("密码太短了吧");
        return false;
    } else if(bds.test(user)&&bds.test(pass1)&&code()){
        return true;
    } else {
        alert("账号密码不符合规范，允许包含字母数字最高16位");
        return false;
    }
}
function login(){
    var user = document.getElementById('luser').value;
    if(user == "" || user.length<=4){
        alert("用户名不合法！");
        return false;
    }else{
        return true;
    }
}
var n = 1,key;
function sendcode(){
    email = document.getElementById('email').value;
    if(email == undefined)email = document.getElementById('email').innerText;
    var gz = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(.[a-zA-Z0-9_-]+)+$/;
    if(gz.test(email)){
        if(n==1){
            n = 0;
            document.getElementById('cd').style.backgroundColor = "#626262";
            document.getElementById('cd').value="发送中...";
            $.ajax({
            url:"/Ly/mail/mail.php",
            type:"POST",
            dataType:"json",
            data:{'email':email},
            success:function(res){
                res = JSON.parse(res)
                var codes = res.code;
                if(codes == 1){
                    document.getElementById('cd').value="已发送 注意查收 可能在垃圾邮箱";
                    key = res.key;
                }else{
                    alert("发送失败，检查邮箱正确性！");
                    n = 1;
                    document.getElementById('cd').style.backgroundColor = "#F0F0F0";
                    document.getElementById('cd').value="获取验证码";
                }
            },
            dataType:"html"
        });
        }else{
            alert("验证码已发送或发送中");
        }
    }else{
        alert("邮箱不合法！")
    }
}
function code(){
    var keys = document.getElementById('cds').value;
    if(n==0&&sha256(keys)==key){
        return true;
    }else{
        alert("验证码错误");
        return false;
    }
}