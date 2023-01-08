//初始化
var host = "http://14.29.190.187:54223/chaoXing/v3/getAnswer.php?tm=";
var type_ = "0"
var url_
console.log("open");
var type_=document.cookie;
if(type_ == 0){
    document.getElementById('type_text_').innerHTML="单选题模式"}
    else if(type_ == 1){
        document.getElementById('type_text_').innerHTML="多选题模式"
    }
    else if(type_ == 3){
        document.getElementById('type_text_').innerHTML="判断题模式"
    }else{
        type_ = "0"
        document.cookie=type_;
    }
//获取链接跳转部分
function open_(){
    console.log("open1");
    tmu = document.getElementById('tm').value;
    url_ = host + tmu + "&type=" + type_;
    console.log(url_);
    window.open(url_);
}  
    
//类型选择部分
function danx(){
    type_ = "0"
    document.cookie=type_;
    console.log(type_);
    document.getElementById('type_text_').innerHTML="单选题模式";
}
function duox(){
    type_ = "1"
    document.cookie=type_;
    console.log(type_);
    document.getElementById('type_text_').innerHTML="多选题模式";
}
function pand(){
    type_ = "3"
    document.cookie=type_;
    console.log(type_);
    document.getElementById('type_text_').innerHTML="判断题模式"
}

//翻译Unicode编码部分
function fanyi(){
    Unic = document.getElementById('fyi').value;
    U8 = eval("'" + Unic + "'");
    console.log(U8);
    document.getElementById('neir').innerHTML=U8
}

//清空部分
function clear_open(){
    console.log("open_clear");
    location.href=""
    //document.getElementById('tm').innerHTML=""
}
