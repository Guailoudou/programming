
// function openDialog(){
//     document.getElementById('txt').style.display='block';
//     document.getElementById('botton1').style.display='block';
//     document.getElementById('button2').style.display='none';

//         }
// function closeDialog(){
//     document.getElementById('txt').style.display='none';
//     document.getElementById('button1').style.display='none';
//     document.getElementById('button2').style.display='block';
//         }
var n = document.cookie; //读取cookie里面的数据赋值到n
var date=30;  
var txt;
var year= new Date(new Date().getTime() + date*24*60*60*1000); //转化时间30天
var top_n = "25";
var tmd = 1;
document.getElementById('shuz').innerHTML=n;
var wav = new Audio('wav/percussion instrument.wav') //读取音频文件
function suzi(){  //suzi()的触发器
    n ++   //n的值+1
    document.getElementById('shuz').innerHTML=n; //将id为shuz的元素显示的内容换成n
    document.cookie="=" + n + ";" + "expires="+year; //将n的值写入cookie存储30天
    donhua()
    wav.play();  //播放音频
        }
function qinkon(){
    n = 0
    document.getElementById('shuz').innerHTML=n;
    document.cookie="=" + n + ";" + "expires="+year;
}
var user = navigator.userAgent.toLowerCase(); //获取用户设备数据
    var platform;
        if(user.indexOf("windows") != -1 ){  //判断有无Windows 无返回-1 不是-1则运行下面指令
            document.getElementById('img_id').style.width = "40%";  //将id为img_id的元素的style-width设置为40%
        }
function donhua(){
    console.log ("执行donhua了"); //发送到控制台中（用来检查程序运行到哪了）
    top_n=25;
    tmd = 1;
    var namep = "gde" + n
    var txt = document.createElement("a"); //新建html元素<a>为函数txt
    var t = document.createTextNode("功德+1"); //新建文本内容到函数t
    txt.appendChild(t); //将文本内容t放入txt
    txt.setAttribute('id',namep) //将id=namep属性加入txt
    document.getElementById("donhuaid").appendChild(txt); //在id为donhuaid的元素中添加txt元素
    document.getElementById(namep).className="don"; //向id为donhuaid的元素中添加class
    dong()

    }
function dong(){
        namep = "gde" + n;
        if (top_n == 9){
        /* document.getElementById(namep).remove(); */
        document.getElementById("donhuaid").innerHTML="";
        }else{
        top_n = top_n - 1;
        tmd = tmd - 0.05;
        document.getElementById(namep).style.top = top_n + "%";
        document.getElementById(namep).style.color = "rgb(255, 255, 255,"+ tmd + ")";
        setTimeout("dong()",10) ;
        }
    }

