import requests,os,json,time
url = "http://172.17.3.2/login?id=1"
jsonwj = os.path.exists("wic-config.json")

def wjxt():
    name = input('请输入账户：')
    password = input('请输入密码：')
    mrdat = {'username': name,'password': password,}
    jsontext = json.dumps(mrdat)
    open('wic-config.json','w').write(jsontext)

if jsonwj == False:
    print('没有检测到配置文件，开始生成配置文件。')
    wjxt()
else:
    print("已经存在配置文件")

def login():
    with open('wic-config.json','r') as f:
        key = json.load(f)
    myobj = {'username': key['username'],'password': key['password']}
    x = requests.post(url, data = myobj)
    n1 = x.text.find("登录成功")
    n2 = x.text.find("nginx") #过载
    n3 = x.text.find("异常") #异常代理
    n4 = x.text.find("账号/密码错误") #密码错误
    n5 = x.text.find("代理认证失败") #账户错误
    if n4 != -1 | n5 != -1:
        print("登录失败，请检查账户密码，下面可以重新设置账户密码，设置完之后重新启动")
        wjxt()
        login()
    elif n2 != -1 :
        print("登录服务器过载，将在2s后再次尝试登录")
        time.sleep(2)
        login()
    elif n1 != -1:
        print("登录成功")
    elif n3 != -1 :
        print("出现异常代理行为，账户被临时封禁，将在5min后尝试重新连接")
        time.sleep(300)
        login()
    else:
        print("出现了意料之外的结果,开始导出错误反馈日志")
        open('web-err.log','w').write(x.text)
        print("导出完毕，请将web-err.log文件提交给我，这有助于我修复这个问题，文件在程序本体位置")
        print("我的联系方式--QQ：124193334 Email：Guailoudou@163.com")
        os.system("pause")

net = requests.get(url)
netlog = net.text.find("登录成功")
if netlog == -1:
    print("检测到未登录，开始登录")
    login()
    os.system("exit")
else:
    print("已经登录了")
    os.system("pause")
    os.system("exit")