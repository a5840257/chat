<?php
//error_reporting(E_ALL);
//set_time_limit(0);
////ob_implicit_flush();
//
//$address = '127.0.0.1';
//$port = 10005;
////创建端口
//if( ($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
//    echo "socket_create() failed :reason:" . socket_strerror(socket_last_error()) . "\n";
//}
//
////绑定
//if (socket_bind($sock, $address, $port) === false) {
//    echo "socket_bind() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
//}
//
////监听
//if (socket_listen($sock, 5) === false) {
//    echo "socket_bind() failed :reason:" . socket_strerror(socket_last_error($sock)) . "\n";
//}
//
//do {
//    //得到一个链接
//    if (($msgsock = socket_accept($sock)) === false) {
//        echo "socket_accepty() failed :reason:".socket_strerror(socket_last_error($sock)) . "\n";
//        break;
//    }
//    //welcome  发送到客户端
//    $msg = "<font color='red'>server send:收到大力的信息啦！！</font><br/>";
//    socket_write($msgsock, $msg, strlen($msg));
//    echo 'read client message\n';
//    $buf = socket_read($msgsock, 8192);
//    $talkback = "received message:$buf\n";
//    echo $talkback;
//    if (false === socket_write($msgsock, $talkback, strlen($talkback))) {
//        echo "socket_write() failed reason:" . socket_strerror(socket_last_error($sock)) ."\n";
//    } else {
//        echo 'send success';
//    }
//    socket_close($msgsock);
//} while(true);
////关闭socket
//socket_close($sock);

/**
 * File name server.php
 * 服务器端代码
 *
 * @author guisu.huang
 * @since 2012-04-11
 *
 */

//确保在连接客户端时不会超时
set_time_limit(0);
//设置IP和端口号
$address = "127.0.0.1";
$port = 2046; //调试的时候，可以多换端口来测试程序！
/**
 * 创建一个SOCKET
 * AF_INET=是ipv4 如果用ipv6，则参数为 AF_INET6
 * SOCK_STREAM为socket的tcp类型，如果是UDP则使用SOCK_DGRAM
 */
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("socket_create() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//阻塞模式
socket_set_block($sock) or die("socket_set_block() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//绑定到socket端口
$result = socket_bind($sock, $address, $port) or die("socket_bind() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
//开始监听
$result = socket_listen($sock, 4) or die("socket_listen() 失败的原因是:" . socket_strerror(socket_last_error()) . "/n");
echo "OK\nBinding the socket on $address:$port ... ";
echo "OK\nNow ready to accept connections.\nListening on the socket ... \n";
do { // never stop the daemon
    //它接收连接请求并调用一个子连接Socket来处理客户端和服务器间的信息
    $msgsock = socket_accept($sock) or  die("socket_accept() failed: reason: " . socket_strerror(socket_last_error()) . "/n");

    //读取客户端数据
    echo "Read client data \n";
    //socket_read函数会一直读取客户端数据,直到遇见\n,\t或者\0字符.PHP脚本把这写字符看做是输入的结束符.
    $buf = socket_read($msgsock, 8192);
    echo "Received msg: $buf   \n";

    //数据传送 向客户端写入返回结果
    $msg = "收到客户端信息 \n";
    socket_write($msgsock, $msg, strlen($msg)) or die("socket_write() failed: reason: " . socket_strerror(socket_last_error()) ."/n");
    //一旦输出被返回到客户端,父/子socket都应通过socket_close($msgsock)函数来终止
    socket_close($msgsock);
} while (true);
socket_close($sock);