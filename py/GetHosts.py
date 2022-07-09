# -*- coding: utf-8 -*-
import socket
hosts = ''
rfile = open("other/domain.txt","r")
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
wfile = open("/GithubHost/hosts.txt",'w')
wfile.write(hosts)
wfile.close()
