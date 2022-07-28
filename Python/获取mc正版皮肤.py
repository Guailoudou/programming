import requests
print('获取Minecraft正版皮肤工具 注：错误的ID或重复下载会导致卡住')
n = 1
while n < 10:
 api = "https://api.xingzhige.com/API/get_Minecraft_skins/?name="
 name = input("ID：")
 filename = name + ".png"
 url1 = api + name
 url = url1 + "&type=皮肤"
 myfile = requests.get(url)
 open(filename, 'wb').write(myfile.content)
 print("下载完成 输入ID继续下载 无需直接关掉即可 -by Guailoudou & 星之阁API")