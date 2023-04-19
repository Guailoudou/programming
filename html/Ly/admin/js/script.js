var uid,username;
function redo(nametxt,text,uid,username){
    //获取id为ly的div元素
    var nametxt,text,uid,username;
    window.uid =uid;
    window.username =username;
    document.getElementById("ly").innerHTML="";
var ly = document.getElementById("ly");
//创建一个textarea元素，设置id为names，行数为1，列数为40，自动完成为on，最大长度为12，占位符为"怎么称呼你呢？"
var names = document.createElement("textarea");
names.id = "names";
names.rows = 1;
names.cols = 40;
names.autocomplete = "on";
names.maxlength = 12;
names.value = nametxt;
//创建一个br元素
var br1 = document.createElement("br");
//创建另一个textarea元素，设置id为txt_，行数为10，列数为40，自动完成为off，最大长度为300，占位符为"这里输入留言内容奥,不能少于3个字符&#13;快来给我留言吧~&#13;可以把你的烦恼都说出来呢~"
var txt_ = document.createElement("textarea");
txt_.id = "txt_";
txt_.rows = 10;
txt_.cols = 40;
txt_.autocomplete = "off";
txt_.value = text;
//创建另一个br元素
var br2 = document.createElement("br");
//创建另一个br元素
var br3 = document.createElement("br");
//创建一个button元素，设置onclick属性为up()，class属性为bottle，文本内容为"提交"
var button = document.createElement("button");
button.onclick = up;
button.className = "bottle";
button.textContent = "提交";
//将创建的元素依次添加到ly元素的内部
ly.appendChild(names);
ly.appendChild(br1);
ly.appendChild(txt_);
ly.appendChild(br2);
ly.appendChild(br3);
ly.appendChild(button);
}
function up(){
    var uid=window.uid;
    var txt = document.getElementById('txt_').value;
    var urltxt = encodeURIComponent(txt);
    var names = document.getElementById('names').value;
    var urlname = encodeURIComponent(names);
    url = "admin.php?type=2&uid="+uid+"&name="+urlname+"&txt="+urltxt+"&username="+window.username;
    location.href=url;
}
function csh(){
    document.getElementById('regui').style.display='none';
    document.getElementById('loginui').style.display='flex';
}
function reg(){
    document.getElementById('loginui').style.display='none';
    document.getElementById('regui').style.display='flex';
}
function del() { 
    var msg = "您确定要删除该内容吗？"; 
    if (confirm(msg)==true){ 
     return true; 
    }else{ 
     return false; 
    } 
   } 