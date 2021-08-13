<?php
//Host Table
$host[] = 'raw.githubusercontent.com';
$host[] = 'avatars0.githubusercontent.com';
$host[] = 'avatars1.githubusercontent.com';
$host[] = 'avatars2.githubusercontent.com';
$host[] = 'avatars3.githubusercontent.com';
$host[] = 'avatars4.githubusercontent.com';
$host[] = 'avatars5.githubusercontent.com';
$host[] = 'avatars6.githubusercontent.com';
$host[] = 'avatars7.githubusercontent.com';
$host[] = 'avatars8.githubusercontent.com';
$host[] = 'github.com';
$data = "";
function ping($host) {
    $start = microtime();
    $icmp_socket = socket_create(AF_INET, SOCK_RAW, 1);
    socket_set_block($icmp_socket);
    socket_set_option($icmp_socket, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 1, "usec" => 0));
    /* connect to socket */
    socket_connect($icmp_socket, $host, null);
    /* 创建一个发送包*/
    $request = "\x08\x00\x19\x2f\x00\x00\x00\x00\x70\x69\x6e\x67";
    socket_send($icmp_socket, $request, strlen($request), 0);
    if (@socket_read($icmp_socket, 255)) {
        $end = microtime();
        $time = $end - $start;
        return $time;
    } else {
        return 99999;//超时
    }
    socket_close($icmp_socket);
}
foreach ($host as $name) {
    $ips = gethostbynamel($name);
    $time = array();
    foreach ($ips as $tmp_ip) {
        $time[] = ping($tmp_ip);
    }
    var_dump($ips);
    var_dump($time);
    $len = count($time);
    $min = $time[0];
    $i = 0;
    $loc = 0;
    for ($i = 0;$i < $len;$i++) {
        if ($min > $time[$i]) {
            $loc = $i;
            $min = $time[$i];
        }
    }
    $data = $data . $ips[$loc] . " " . $name . "\r\n";
}
echo $data;