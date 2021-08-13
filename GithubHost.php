<?php
//Host Table
$host[] = 'raw.githubusercontent.com';
$host[] = 'api.github.com';
$host[] = 'github.githubassets.com';
$host[] = 'avatars.githubusercontent.com';
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
foreach ($host as $name) {
    $ips = gethostbynamel($name);
    $loc = 0;  
    $data = $data . $ips[$loc] . " " . $name . "\r\n";
}
file_put_contents("GithubHost.txt",$data);
