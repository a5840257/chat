<?php
////error_reporting(E_ALL);
//echo "<h2>tcp/ip connection </h2>\n";
//$service_port = 10005;
//$address = '127.0.0.1';
//
//$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
//if ($socket === false) {
//    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
//} else {
//    echo "OK. \n";
//}
//
//echo "Attempting to connect to '$address' on port '$service_port'...";
//$result = socket_connect($socket, $address, $service_port);
//if($result === false) {
//    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
//} else {
//    echo "OK \n";
//}
//$in = "HEAD / http/1.1\r\n";
//$in .= "大力出奇迹 \r\n";
//$in .= "Connection: close\r\n\r\n";
//$out = "";
//echo "sending http head request ...";
//socket_write($socket, $in, strlen($in));
//echo  "OK\n";
//
//echo "Reading response:\n\n";
//while ($out = socket_read($socket, 8192)) {
//    echo $out;
//}
//echo "closeing socket..";
//socket_close($socket);
//echo "ok .\n\n";

/**
 * File name:client.php
 * 客户端代码
 *
 * @author guisu.huang
 * @since 2012-04-11
 */
$content = $_POST['msg'];
$name = $_POST['name'];
$msg = '收件人:' . $name . ', 内容：' . $content;
set_time_limit(0);

$host = "127.0.0.1";
$port = 2046;
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create  socket\n"); // 创建一个Socket

$connection = socket_connect($socket, $host, $port) or die("Could not connet server\n");    //  连接
socket_write($socket, $msg) or die("Write failed\n"); // 数据传送 向服务器发送消息
while ($buff = socket_read($socket, 8192)) {
    //echo("Response was:" . $buff . "\n");
    echo json_encode(['msg' => $buff]);
}
socket_close($socket);