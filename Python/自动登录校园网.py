import requests,os,json
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
    n = x.text.find("登录成功")
    if n == -1:
        print("登录失败，请检查账户密码，下面可以重新设置账户密码，设置完之后重新启动")
        wjxt()
        login()
    else:
        print("登录成功")

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