import requests
print("请输入QQ号，然后按OK，即可获取你的QQ头像")
n = 1
while n == 10:
 QQ =  input("QQ：")
 url = "https://q1.qlogo.cn/g?b=qq&nk="+ QQ +"&s=0"
 myfile = requests.get(url)
 filename = QQ + ".png"
 open(filename, 'wb').write(myfile.content)
 print("下载完成 输入QQ继续下载 无需直接关掉即可 -by Guailoudou")
