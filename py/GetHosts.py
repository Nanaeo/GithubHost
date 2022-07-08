# -*- coding: utf-8 -*-
from urllib import request
import os,sys
import socket
hosts = ''
dpath = os.path.abspath(os.path.join(os.getcwd(), ".."))
print("当前目录 "+dpath)
rfile = open(dpath+"/GithubHost/other/domain.txt","r")
domain = rfile.read().splitlines()
print(domain)
rfile.close()
for index in range(len(domain)):
    print(domain[index])
    try:
      ip = socket.gethostbyname(domain[index])
    except:
      ip = "unknow"
      print("解析失败" + domain[index])
    hosts = hosts + ip + " " + domain[index]+"\r\n"
wfile = open(dpath+"/GithubHost/hosts.txt",'w')
wfile.write(hosts)
wfile.close()
