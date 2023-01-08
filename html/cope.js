//实现点击复制功能 复制的页面中没有的文本
function cope(){  //复制功能，要提前在页面里面添加一个id为sjikuai的div容器
    var txt = document.createElement("textarea"); //新建html标签<textarea>为函数txt
    var t = document.createTextNode("这里是要复制的东西");//设置一个文本
    txt.appendChild(t); //把文本添加到新标签
    txt.setAttribute('id',"ftp_url"); //把id属性加到新标签
    document.getElementById("sjikuai").appendChild(txt); //添加新标签到页面div_id_sjikuai处
    var ftp_url = document.getElementById('ftp_url').select() //选择id里面的文本
    document.execCommand("copy"); //执行复制
    document.getElementById("sjikuai").innerHTML=""; //删除刚才创建的新标签
    alert("已经复制成功");
}
//原理是在页面里面先创建要复制的内容，然后执行复制之后再删除内容，因为过程很快，不会发现页面有变化