# -*- coding: utf-8 -*-
import socket,os
from datetime import datetime, timedelta, timezone
def get_now_date_str(format_string="%Y-%m-%d %H:%M:%S"):#"%Y-%m-%d %H:%M:%S"
    utc_dt = datetime.utcnow().replace(tzinfo=timezone.utc)
    bj_dt = utc_dt.astimezone(timezone(timedelta(hours=8)))
    str_date = bj_dt.strftime(format_string)
    return str_date
hosts = []
date_now = get_now_date_str()
rfile = open("other/domain.txt","r")
domain = rfile.read().splitlines()
hosts.append("# GithubHosts by https://github.com/MliKiowa/GithubHost/")
hosts.append('# Last update at %s (Beijing Time)'%date_now)
rfile.close()
for temp in domain:
    try:
      ip = socket.gethostbyname(temp)
    except:
      ip = "unknow"
    hosts.append("%s %s"%(ip,temp))
    data = "\r\n".join(hosts)
wfile = open("hosts.txt",'w')
wfile.write(data)
wfile.close()
