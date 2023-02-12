import random,os,time
#初始化
baodi = 0 #0为小保底 1为大保底
gln = 0.6 #这里是初始概率 带%的 最小0.01 即0.01%，原神默认0.6
timestop = 0.1 #每一抽中间的间隔，单位s
glupn = 74 #多少抽开始概率提升 默认74
glup = 6 #概率提升后每一抽概率增加百分比 原神默认6%

#################################################
baodi_n = 0 #计算概率的抽数
xiao = 0 #记录小保底抽数
n = 0 #实际总抽数
ty = 0 # 0没出金的情况 1触发小保底歪了 2出金且没歪，程序结束 
gl = gln
def zdygl(gl1):
    sj = random.randint(1,10000) #随机1-10000
    gl1 = gl1 * 100
    if sj <= gl1:
        print("\033[1;33;10m第",n,"抽:出金了！!\033[0m")
        if baodi == 0:
            wai = random.randint(0,1)
            if wai == 1:
                print("小保底你没有歪!!")
                print("\033[1;31;10m抽卡总结：")
                print("小保底\033[1;33;10m",n,"\033[1;31;10m抽，没歪")
                print("一共\033[1;33;10m",n,"\033[1;31;10m抽\033[0m")
                return 2
            else:
                print("但是你歪了")
                return 1
        else:
            print("\033[1;31;10m抽卡总结：")
            print("小保底\033[1;33;10m",xiao,"\033[1;31;10m抽，歪了")
            print("大保底\033[1;33;10m",baodi_n,"\033[1;31;10m抽")
            print("一共\033[1;33;10m",n,"\033[1;31;10m抽\033[0m")
            return 2
    else:
        print("第",n,"抽:没出金")
        return 0
#循环主体
while ty <= 1:
    if ty == 0:
        n = n + 1
        baodi_n = baodi_n + 1
        if baodi_n >= glupn:
            gl = gl + glup
            time.sleep(timestop)
            ty = zdygl(gl)
        else:
            time.sleep(timestop)
            ty = zdygl(gl)
    elif ty == 1:
        gl = gln
        ty = 0
        xiao = n
        baodi_n = 1
        n = n + 1
        baodi = 1
        time.sleep(timestop)
        ty = zdygl(gl)
os.system("pause")