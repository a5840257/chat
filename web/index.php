<?php
$userList = [
    '1' => ['name' => '刘秀', 'img' => 'img/head/2013.jpg'],
    '2' => ['name' => '陈诚', 'img' => 'img/head/2014.jpg'],
    '3' => ['name' => '王旭', 'img' => 'img/head/2015.jpg'],
    '4' => ['name' => '张灵', 'img' => 'img/head/2016.jpg'],
    '5' => ['name' => '吴敬', 'img' => 'img/head/2017.jpg'],
    '6' => ['name' => '王海东', 'img' => 'img/head/2018.jpg'],
    '7' => ['name' => '郑小勇', 'img' => 'img/head/2019.jpg'],
    '8' => ['name' => '张珊珊', 'img' => 'img/head/2020.jpg'],
    '9' => ['name' => '刘强', 'img' => 'img/head/2021.jpg'],
    '10' => ['name' => '程海斌', 'img' => 'img/head/2022.jpg'],
];
$uid = $_GET['uid']?? null;
if (empty($uid)) {
    echo '没有登入账号';
    exit;
}
if (empty($userList[$uid])) {
    echo '登入账号不正确';
    exit;
}
$arr = $userList[$uid];
unset($userList[$uid]);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>前端js(jquery)在线聊天</title>
    <meta name="keywords" content="前端js在线聊天"/>
    <meta name="description" content="前端js在线聊天"/>

    <link rel="stylesheet" type="text/css" href="css/chat.css"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>

    <script src='js/socket.io.js'></script>
    <script src='/notify.js'></script>
    <!--[if lt IE 7]>
    <script src="js/IE7.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('body, div, ul, img, li, input, a, span ,label');
    </script>
    <![endif]-->
</head>
<body>
<div style="text-align: center; font-weight: bold; font-size: 18px;">登入姓名：<?= $arr['name'] ?></div>
<div class="content">
    <div class="chatBox">
        <div class="chatLeft">
            <div class="chat01">
                <div class="chat01_title">
                    <ul class="talkTo">
                        <li><a href="javascript:;"><?= reset($userList)['name'] ?></a></li>
                    </ul>
                    <a class="close_btn" href="javascript:;"></a>
                </div>
                <div class="chat01_content">
                    <?php foreach ($userList as $key => $value): ?>
                        <div class="message_box mes<?= $key ?>" <?= $value['name'] == reset($userList)['name'] ? 'style="display: block;"' : '' ?>>
                        </div>
                    <?php endforeach; ?>
                    <!--                    <div class="message_box mes2">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes3">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes4">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes5">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes6">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes7">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes8">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes9">-->
                    <!--                    </div>-->
                    <!--                    <div class="message_box mes10">-->
                    <!--                    </div>-->
                </div>
            </div>
            <div class="chat02">
                <div class="chat02_title">
                    <a class="chat02_title_btn ctb01" href="javascript:;"></a><a class="chat02_title_btn ctb02"
                                                                                 href="javascript:;" title="选择文件">
                        <embed width="15" height="16"
                               flashvars="swfid=2556975203&amp;maxSumSize=50&amp;maxFileSize=50&amp;maxFileNum=1&amp;multiSelect=0&amp;uploadAPI=http%3A%2F%2Fupload.api.weibo.com%2F2%2Fmss%2Fupload.json%3Fsource%3D209678993%26tuid%3D1887188824&amp;initFun=STK.webim.ui.chatWindow.msgToolBar.upload.initFun&amp;sucFun=STK.webim.ui.chatWindow.msgToolBar.upload.sucFun&amp;errFun=STK.webim.ui.chatWindow.msgToolBar.upload.errFun&amp;beginFun=STK.webim.ui.chatWindow.msgToolBar.upload.beginFun&amp;showTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.showTipFun&amp;hiddenTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.hiddenTipFun&amp;areaInfo=0-16|12-16&amp;fExt=*.jpg;*.gif;*.jpeg;*.png|*&amp;fExtDec=选择图片|选择文件"
                               data="upload.swf" wmode="transparent" bgcolor="" allowscriptaccess="always"
                               allowfullscreen="true"
                               scale="noScale" menu="false" type="application/x-shockwave-flash"
                               src="http://service.weibo.com/staticjs/tools/upload.swf?v=36c9997f1313d1c4"
                               id="swf_3140">
                    </a><a class="chat02_title_btn ctb03" href="javascript:;" title="选择附件">
                        <embed width="15" height="16"
                               flashvars="swfid=2556975203&amp;maxSumSize=50&amp;maxFileSize=50&amp;maxFileNum=1&amp;multiSelect=0&amp;uploadAPI=http%3A%2F%2Fupload.api.weibo.com%2F2%2Fmss%2Fupload.json%3Fsource%3D209678993%26tuid%3D1887188824&amp;initFun=STK.webim.ui.chatWindow.msgToolBar.upload.initFun&amp;sucFun=STK.webim.ui.chatWindow.msgToolBar.upload.sucFun&amp;errFun=STK.webim.ui.chatWindow.msgToolBar.upload.errFun&amp;beginFun=STK.webim.ui.chatWindow.msgToolBar.upload.beginFun&amp;showTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.showTipFun&amp;hiddenTipFun=STK.webim.ui.chatWindow.msgToolBar.upload.hiddenTipFun&amp;areaInfo=0-16|12-16&amp;fExt=*.jpg;*.gif;*.jpeg;*.png|*&amp;fExtDec=选择图片|选择文件"
                               data="upload.swf" wmode="transparent" bgcolor="" allowscriptaccess="always"
                               allowfullscreen="true"
                               scale="noScale" menu="false" type="application/x-shockwave-flash"
                               src="http://service.weibo.com/staticjs/tools/upload.swf?v=36c9997f1313d1c4"
                               id="swf_3140">
                    </a>
                    <label class="chat02_title_t">
                        <a href="chat.htm" target="_blank">聊天记录</a></label>
                    <div class="wl_faces_box">
                        <div class="wl_faces_content">
                            <div class="title">
                                <ul>
                                    <li class="title_name">常用表情</li>
                                    <li class="wl_faces_close"><span>&nbsp;</span></li>
                                </ul>
                            </div>
                            <div class="wl_faces_main">
                                <ul>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_01.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_02.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_03.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_04.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_05.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_06.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_07.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_08.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_09.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_10.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_11.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_12.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_13.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_14.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_15.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_16.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_17.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_18.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_19.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_20.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_21.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_22.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_23.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_24.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_25.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_26.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_27.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_28.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_29.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_30.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_31.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_32.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_33.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_34.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_35.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_36.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_37.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_38.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_39.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_40.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_41.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_42.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_43.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_44.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_45.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_46.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_47.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_48.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_49.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_50.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_51.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_52.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_53.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_54.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_55.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_56.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_57.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_58.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_59.gif"/></a></li>
                                    <li><a href="javascript:;">
                                            <img src="img/emo_60.gif"/></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="wlf_icon">
                        </div>
                    </div>
                </div>
                <div class="chat02_content">
                    <textarea id="textarea"></textarea>
                </div>
                <div class="chat02_bar">
                    <ul>
                        <li style="left: 20px; top: 10px; padding-left: 30px;">聊天桌面，24小时在线为您服务！</li>
                        <li style="right: 5px; top: 5px;"><a href="javascript:;">
                                <img src="img/send_btn.jpg"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="chatRight">
            <div class="chat03">
                <div class="chat03_title">
                    <label class="chat03_title_t">
                        成员列表</label>
                </div>
                <div class="chat03_content">
                    <ul>
                        <?php foreach ($userList as $key => $value): ?>
                            <li class="<?= $value['name'] == reset($userList)['name'] ? 'choosed ' . $key : $key ?>">
                                <label class="offline <?= $key ?>"></label>
                                <strong style="display: none"><?= $key ?></strong>
                                <a href="javascript:;">
                                    <img src="<?= $value['img'] ?>">
                                    <div style="position: relative; top: -30px; height: 30px; width: 30px; background-color: #a0a0a0;opacity:0.8;filter:alpha(opacity=80);"></div>
                                </a>
                                <a href="javascript:;" class="chat03_name"><?= $value['name'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div style="clear: both;">
        </div>
    </div>
</div>
<input type="hidden" value="<?= $uid ?>" id="uid">
<input type="hidden" value="<?= $arr['name'] ?>" id="name">
<input type="hidden" value="<?= $arr['img'] ?>" id="img">
<h3>测试:</h3>
当前用户uid：<b class="uid"></b><br>
<script>
    // 使用时替换成真实的uid，这里方便演示使用时间戳
    var uid = <?= $uid?>;
    $('#send_to_one').attr('href', 'http://' + document.domain + ':2124/?type=publish&content=%E6%B6%88%E6%81%AF%E5%86%85%E5%AE%B9&to=' + uid);
    $('.uid').html(uid);
    $('#send_to_all').attr('href', 'http://' + document.domain + ':2124/?type=publish&content=%E6%B6%88%E6%81%AF%E5%86%85%E5%AE%B9');
    $('.uid').html(uid);
    $('.domain').html(document.domain);
</script>
<script>
    $(document).ready(function () {
        // 连接服务端
        var socket = io('http://' + document.domain + ':2122');
        // 连接后登录
        socket.on('connect', function () {
            socket.emit('login', uid);
        });
        // 后端推送来消息时
        socket.on('new_msg', function (msg) {
            message();
//            $('#content').html('收到消息：'+msg);
//            $('.notification.sticky').notify();
            var arr = msg.split('|||');
            var uid = arr[0], msg = arr[1];
            var jsonStr = <?= json_encode($userList)?>;
            var json = eval(jsonStr);
            var time = '<?= date('Y-m-d H:i:s', time())?>';

            function h() {
                -1 != msg.indexOf("*#emo_") && (msg = msg.replace("*#", "<img src='img/").replace("#*", ".gif'/>"), h())
            }

            h();
            var i = "<div class='message clearfix'>" + "<div class='user-logo'>" + "<img src='" + json[uid].img + "'/>" + "</div>" +
                "<div class='wrap-text'>" + "<h5 class='clearfix'>" + json[uid].name + " 的回复</h5>" + "<div>" + msg + "</div>" +
                "</div>" + "<div class='wrap-ri'>" + "<div clsss='clearfix'><span>" + time + "</span></div>" +
                "</div>" + "<div style='clear:both;'></div>";
            $(".mes" + uid).append(i);
            $('.' + uid).removeClass('offline').addClass('online');
            $(".chat01_content").scrollTop($(".mes" + uid).height())
        });
        var init = new Array();
        // 后端推送来在线数据时
        socket.on('update_online_count', function (online_stat) {
            var init1 = new Array();
            var arr = online_stat.split('|||');
            var uid1 = arr[0], msg = arr[1];
            var json = $.parseJSON(uid1);
            for (var key in json) {
                init1.push(key);
                init.push(key);
                $('.chat03_content li.' + key).find('a div').attr('style', '');
            }
            $.unique(init1);
            $.unique(init);
            var diff = array_difference(init, init1);
            for (var key in diff) {
                $('.chat03_content li.' + diff[key]).find('a div').attr('style', 'position: relative; top: -30px; height: 30px; width: 30px; background-color: #a0a0a0;opacity:0.8;filter:alpha(opacity=80);');
            }
            $('#online_box').html(msg);
        });
        function array_difference(a, b) { // 差集 a - b
            //clone = a
            var clone = a.slice(0);
            for (var i = 0; i < b.length; i++) {
                var temp = b[i];
                for (var j = 0; j < clone.length; j++) {
                    if (temp === clone[j]) {
                        //remove clone[j]
                        clone.splice(j, 1);
                    }
                }
            }
            return array_remove_repeat(clone);
        }

        function array_remove_repeat(a) { // 去重
            var r = [];
            for (var i = 0; i < a.length; i++) {
                var flag = true;
                var temp = a[i];
                for (var j = 0; j < r.length; j++) {
                    if (temp === r[j]) {
                        flag = false;
                        break;
                    }
                }
                if (flag) {
                    r.push(temp);
                }
            }
            return r;
        }
    });
</script>
<div id="footer">
    <center id="online_box"></center>
</div>
</body>
</html>


