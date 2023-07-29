#include <iostream>
#include <fstream>
#include <sstream>
#include <iomanip>
#include <chrono>
#include <string>
#include <cstring>
#include <random>
#include "configor/json.hpp"
#include "resource.h"
#include "releaseHelper.h"
int main()
{
    //声明函数.
    bool isFileExists_ifstream(std::string & name);
    void play0(std::string myuuid),play1(int SrcPort, int DstPort, std::string uuid,std::string myuuid);
    int app();
    std::string create_uuid();
    //声明变量
    int type,SrcPort,DstPort;
    std::string uuid,myuuid;
    //system("pause");
    std::string flie = "bin\\uuid.dat";
    std::string apps = "bin\\openp2p.exe";
    std::string log = "bin\\bin\\log\\openp2p.log";
    std::string log0 = "bin\\log\\openp2p.log";
    //释放openp2p文件
    if (!isFileExists_ifstream(apps))
    {
        app();
    }
    //清除log
    if (isFileExists_ifstream(log))
    {
        system("del bin\\bin\\log /q");
    }
    if (isFileExists_ifstream(log0))
    {
        system("del bin\\log /q");
        std::cout << "检查到你自己打开了bin里面的openp2p.exe，最好不要直接打开bin启动里面的文件哦\n" << std::endl;
    }
    //生成/获取uuid
    if (isFileExists_ifstream(flie))
    {
        std::ifstream infile;
        infile.open("bin\\uuid.dat");
        infile >> myuuid;
        infile.close();
    }
    else
    {
        myuuid = create_uuid();
        std::ofstream outfile;
        outfile.open("bin\\uuid.dat");
        outfile << myuuid << std::endl;
        outfile.close();
    }
    std::cout << "*初始化完毕*\n*********************************************\n                使用说明\n    1.根据提示输入参数\n    2.注意你的uuid是：" << myuuid << "\n    4.被连接需要把你的uuid和端口发给对方\n    3.本程序基于openp2p\n*********************************************\n" << std::endl;
    system("title openp2p-launcher-by-Guailoudou");
    std::cout << "被连接输入：0，连接输入：1，以上一次的连接方式连接输入：2 " << std::endl;
    std::cin >> type;
    if (type == 0) 
    {
        play0(myuuid);
        system("bin\\openp2p.exe");
    }
    else if(type == 1)
    {
        std::cout << "开始运行之后用*127.0.0.1:本地端口*连接\n请输入对方uuid：" << std::endl;
        std::cin >> uuid;
        std::cout << "请输入对方端口：" << std::endl;
        std::cin >> DstPort;
        std::cout << "请输入本地连接地址的端口：\n127.0.0.1:";
        std::cin >> SrcPort;
        std::cout << "上面这个是你本地连接的地址哦，程序2s后开始运行";
        Sleep(2000);
        play1(SrcPort,DstPort,uuid,myuuid);
        system("bin\\openp2p.exe");
    }
    else if (type==2)
    {
        system("bin\\openp2p.exe");
    }
    else
    {
        std::cout << "输入错误" << std::endl;
    }
    system("pause");
    return 0;
}
////////////////////////////////////////////////////////////////////////////
//生成仅供连接配置
void play0(std::string myuuid)
{
    configor::json::value j;
    j["network"]["Token"] = 9222084896127568278;
    j["network"]["Node"] = myuuid;
    j["network"]["User"] = "Guailoudou";
    j["network"]["ShareBandwidth"] = 10;
    j["network"]["ServerHost"] = "api.openp2p.cn";
    j["network"]["ServerPort"] = 27183;
    j["network"]["UDPPort1"] = 27182;
    j["network"]["UDPPort2"] = 27183;
    j["network"]["TCPPort"] = 50448;
    j["LogLevel"] = 1;
    //std::cout << json::wrap(j);
    std::ofstream ofs("bin/config.json");
    ofs << std::setw(4) << configor::json::wrap(j) << std::endl;
}
//生成tcp-app配置
void play1(int SrcPort,int DstPort,std::string uuid, std::string myuuid)
{
    configor::json::value array;
    configor::json::value root;
    configor::json::value j;
    j["network"]["Token"] = 9222084896127568278;
    j["network"]["Node"] = myuuid;
    j["network"]["User"] = "Guailoudou";
    j["network"]["ShareBandwidth"] = 10;
    j["network"]["ServerHost"] = "api.openp2p.cn";
    j["network"]["ServerPort"] = 27183;
    j["network"]["UDPPort1"] = 27182;
    j["network"]["UDPPort2"] = 27183;
    j["network"]["TCPPort"] = 50448;
    
    array["AppName"] = "***";
    array["Protocol"] = "tcp";
    array["SrcPort"] = SrcPort;//本地端口
    array["PeerNode"] = uuid;//远程设备名
    array["DstPort"] = DstPort;//远程端口
    array["DstHost"] = "localhost";
    array["PeerUser"] = "";
    array["Enabled"] = 1;
    array["AppName"] = "***";
    root = configor::json::array({ configor::json::value(array) });
    j["apps"] = configor::json::value(root);
    
    j["LogLevel"] = 1;
    //std::cout << configor::json::wrap(j);
    std::ofstream ofs("bin/config.json");
    ofs << std::setw(4) << configor::json::wrap(j) << std::endl;
}
//生成uuid
std::string create_uuid()
{
    std::stringstream stream;
    auto random_seed = std::chrono::system_clock::now().time_since_epoch().count();
    std::mt19937 seed_engine(random_seed);
    std::uniform_int_distribution<std::size_t> random_gen;
    std::size_t value = random_gen(seed_engine);
    stream << std::hex << value;

    return stream.str();
}
//判断文件存在
bool isFileExists_ifstream(std::string& name) {
    std::ifstream f(name.c_str());
    return f.good();
}
//释放资源文件
int app()
{
    CReleaseDLL releasehelper;
    bool blRes;
    blRes = releasehelper.FreeResFile(IDR_APP1, "APP", "openp2p.exe");

    if (blRes)
    {
        std::cout << "EXE文件释放成功" << std::endl;
        system("md bin");
        system("move openp2p.exe bin\\openp2p.exe");
    }
    else
    {
        std::cout << "EXE文件释放失败" << std::endl;
    }
    return 0;
}