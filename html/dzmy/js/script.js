var cook = document.cookie; //读取cookie
var arrCookie=cook.split("; "); //以;分隔数据 一定要加空格 cookie 数据之间有个空格
var n
//遍历cookie数组，处理每个cookie对
for(var i=0;i<arrCookie.length;i++){ //从第1组开始，每循环一次i+1（0为第一组） 
    console.log(i);
 var arr=arrCookie[i].split("="); //获取arrcookie里面的第i组数据 以=分隔成若干数组 把这个数组保存在arr
 console.log(arr);
  //找到名称为n的cookie，并返回它的值
 if("n"==arr[0]){ //判断arr数组第一个数据是不是n，是n就执行下面指令，不是if直接跳过，开始下一个for循环
 n=arr[1]; //把arr这个数组的第二个数据保存在n里面
break; //结束for
}
}
if(n="undefined"){
    n = 0;
}
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
    document.cookie="n=" + n + ";" + "expires="+year; //将n的值写入cookie存储30天
    donhua()
    wav.play();  //播放音频
        }
function qinkon(){
    n = 0
    document.getElementById('shuz').innerHTML=n;
    document.cookie="n=" + n + ";" + "expires="+year;
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

