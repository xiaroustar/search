<?php
/**
 * 项目：资源搜 - 最简单的源码资源搜索引擎
 * 描述：完全免费的源码资源搜索引擎
 * 作者：夏柔
 * 发布时间：2025年1月13日
 * 源码官网：https://ym.aa1.cn
 * 源码下载：https://github.com/xiaroustar/search
 * 修改记录：
 *   发布v1.0版本 2w+资源 无需手动发布
 *
 * 项目无后台 纯API实现 如需本地版可联系夏柔 （若无其他需求无需本地 若项目停止运营将会提供备用方案）
 */


include('config.php');



// 获取搜索值和当前页码
// $search_value = $_GET['data_id']?:1;
$search_value = $_POST['aes256_post'];


// 获取客户端 IP

function getUserIP() {
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        // Cloudflare 提供的真实 IP
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = '未知';
    }
    return $ip;
}

// 获取客户端 IP
$user_ip = getUserIP();

// 获取当前的域名
$domain = $_SERVER['HTTP_HOST'];



// 请求的 URL
$url = $dataurl_api."/api/data_api/d_data_download_ase256_api/";



// 使用 POST 请求传送数据
$data = [
    'search_value' => $search_value,
    'user_ip' => $user_ip,
    'domain' => $domain
];

// 初始化 cURL 会话
$ch = curl_init($url);

// 设置 cURL 选项
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// 设置 POST 请求的内容
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// 执行 cURL 请求并获取响应
$response = curl_exec($ch);

// 检查 cURL 错误
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}

// 关闭 cURL 会话
curl_close($ch);

// 处理响应：解析 JSON 数据
$response_data = json_decode($response, true);


if (isset($response_data['status']) && $response_data['status'] === 'success') {

    $post_id = $response_data['data']['id'];
    $down_url = $response_data['data']['down_url'];
    $hidden_content = $response_data['data']['hidden_content'];
    $guid = $response_data['data']['guid'];

if($response_data['data']['cloud_type'] == 'lanzou'){$cloud_type_value =  '蓝奏云';$cloud_type_value_img = '../assets/lanzou.svg';}if($response_data['data']['cloud_type'] == 'baidu'){$cloud_type_value =  '百度云';$cloud_type_value_img = '../assets/baidu.svg';}if($response_data['data']['cloud_type'] == 'alipan'){$cloud_type_value =  '阿里云盘';$cloud_type_value_img = '../assets/alipan.ico';}if($response_data['data']['cloud_type'] == '123pan'){$cloud_type_value =  '123云盘';$cloud_type_value_img = '../assets/yunpan123.svg';}if($response_data['data']['cloud_type'] == 'xunlei'){$cloud_type_value =  '迅雷';$cloud_type_value_img = '../assets/xunlei.svg';}if($response_data['data']['cloud_type'] == 'quark'){$cloud_type_value =  '夸克云盘';$cloud_type_value_img = '../assets/quark.ico';}if($response_data['data']['cloud_type'] == 'other_type'){$cloud_type_value =  '其他';$cloud_type_value_img = '../assets/other.svg';}if($response_data['data']['cloud_type'] == null){$cloud_type_value =  '其他';$cloud_type_value_img = '../assets/other.svg';}


// 获取当前日期
$current_date = date('Y-m-d');
$created_at = date('Y-m-d H:i:s');

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}


// 检查当天ip_address的访问次数
$sql_check_ip = "SELECT COUNT(*) AS visit_count FROM logs WHERE ip_address = '$user_ip' AND DATE(date_only) = '$current_date'";
$result_check_ip = $conn->query($sql_check_ip);

if ($result_check_ip->num_rows > 0) {
    $row = $result_check_ip->fetch_assoc();
    $visit_count_ip = $row['visit_count'];
    
    // 如果IP地址访问次数超过10次，不插入任何记录
    if ($visit_count_ip > 10) {
        $remainingDownloads = 0;


    }else{
        $remainingDownloads = $visit_count_ip;
    }
}

// 检查当天是否已存在相同的post_id和ip_address
$sql_check_post_ip = "SELECT COUNT(*) AS record_count FROM logs WHERE post_id = '$post_id' AND ip_address = '$user_ip' AND DATE(date_only) = '$current_date'";
$result_check_post_ip = $conn->query($sql_check_post_ip);

if ($result_check_post_ip) {
    $row = $result_check_post_ip->fetch_assoc();
    $record_count = $row['record_count'];
    
    // 如果当天已存在相同的post_id和ip_address，不插入记录
    if ($record_count > 0) {

    } else {
        // 如果不存在相同的记录，则插入新记录
        $created_at = date('Y-m-d H:i:s');  // 当前时间
        $sql_insert = "INSERT INTO logs (post_id, ip_address, date_only, created_at) VALUES ('$post_id', '$user_ip', '$current_date', '$created_at')";
        if ($conn->query($sql_insert) === TRUE) {
            // ip记录已插入
        } else {
            echo "ip记录插入出错: " . $conn->error;
        }
    }
} else {

    
}


// 关闭连接
$conn->close();

} else {
    // 如果请求失败，输出错误信息
    echo 'Error: ' . (isset($response_data['message']) ? $response_data['message'] : 'Unknown error');
}







$post_id = $search_value;
// 获取当前日期
$date = date("Y-m-d");


?>
<!DOCTYPE html>
<html class="theme-day" lang="zh-CN">
    
    <head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou">
            <?php echo $post_title;?>在线网盘资源搜索下载-资源搜
        </title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="<?php echo $logo;?>">
        
        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $post_title;?>,网盘全文检索,源码站搜索,免费源码,全网盘类源码,阿里盘搜,云搜,网盘搜索,百度网盘搜索,百度云搜索,阿里云盘搜索,夸克云盘搜索,百度云盘,迅雷云盘,天翼云盘,蓝奏云盘,网盘搜索引擎,网盘搜索神器,网盘资源搜索,资源搜索,资源分享,云盘资源搜索,阿里云盘资源搜索,迅雷云盘搜索">
        <meta class="xiarou-ziyuansou" name="description" content="资源搜是一款最简单的源码资源搜索引擎，页面清爽，资源全面，支持阿里云盘百度云盘阿里云盘等夸克网盘资源搜索。只需输入关键词，即可快速找到相关网盘资源！">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/entry.BMP3qFZ0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/default.B5z-pQNO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FooterStyle2.D4Mv1PiJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Icon.Dan13sfw.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/website.D_-tiCWj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Pendant.y4AbnFSO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/_id_.BFC8vAVk.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Notice.O1KhRlGv.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FireSvg.DYove8g3.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Aside.D6M1Oiat.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/SaveSuc.CD2marx0.css">
        
        <style type="text/css">
            .medium-zoom-overlay{position:fixed;top:0;right:0;bottom:0;left:0;opacity:0;transition:opacity
            .3s;will-change:opacity}.medium-zoom--opened .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}.medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform
            .3s cubic-bezier(.2,0,.2,1)!important}.medium-zoom-image--hidden{visibility:hidden}.medium-zoom-image--opened{position:relative;cursor:pointer;cursor:zoom-out;will-change:transform}
        </style>
        <link href="../assets/atom-one-dark.min.css" rel="stylesheet"
        id="md-editor-hlCss">
        <link rel="stylesheet" href="../assets/katex.min.css"
        id="md-editor-katexCss">
        <input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7">
        
        <!--弹窗-->
    <link rel="stylesheet" type="text/css" href="https://cdn.wpon.cn/2023/newtc/css/message.css" />
    <script src="https://cdn.wpon.cn/2023/newtc/js/jquery.min.js"></script>
    <script src="https://cdn.wpon.cn/2023/newtc/js/message.js" type="text/javascript" charset="utf-8"></script>
    
        <script type="text/javascript">
            function copy_success() {
            $.message({
                type: 'success',
                content: "复制成功"
            });
        }
        function loading_download() {
            $.message({
                type: 'warning',
                content: "获取中，请稍后"
            });
        }
        
        
        // data是需要复制的内容
                        function copyFunction(self) {
                            var timer = null;
                            clearTimeout(timer);
                            var data = self.getAttribute('copy_data');
                            console.log(data);
                            copy_success();
                            // alert('复制成功！');
                            let copyInput = document.createElement("input"); //创建input元素
                            document.body.appendChild(copyInput); //向页面底部追加输入框
                            copyInput.setAttribute("value", data); //添加属性，将需要复制的内容赋值给input元素的value属性
                            copyInput.select(); //选择input元素
                            var res = document.execCommand("Copy", false, null); //执行复制命令(指令参数, 交互方式参数如果是true的话将显示对话框, 动态参数一般为一可用值或属性值)
                            //复制之后再删除元素，否则无法成功赋值
                            document.body.removeChild(copyInput);//删除动态创建的节点
                    
                            document.getElementsByClassName("copySuc")[0].style.display = "block"
                    
                            timer = setTimeout(function copySucHide() {
                                document.getElementsByClassName("copySuc")[0].style.display = "none"
                            }, 1000);
                    
                            return res;
                        }

    </script>

    </head>
    
    <body>
        <div class="xiarou-ziyuansou" id="__nuxt">
            <div class="yp-search-header bg-secondary-bg xiarou-ziyuansou" style="" data-v-5cb43736="">
                <div id="search-result-header" class="yp-header-default xiarou-ziyuansou" data-v-5cb43736=""
                data-v-bdb05f16="">
                    <a href="../" class="yp-header-logo xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="h-[33px] xiarou-ziyuansou" data-v-bdb05f16="">
                            <img src="<?php echo $logo;?>"
                            class="w-auto h-full object-contain xiarou-ziyuansou" alt="资源搜">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou"
                        data-v-bdb05f16="">
                            资源搜
                        </div>
                    </a>
                    <div class="yp-header-search-home yp-header-search xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="yp-header-search-basic xiarou-ziyuansou" style="margin: 0px 400px;"
                        data-v-bdb05f16="">
                            <i class="flex-[114] xiarou-ziyuansou" data-v-bdb05f16="">
                            </i>
                            <div id="resource-search-container" class="yp-search undefined yp-search-header yp-header-search-input xiarou-ziyuansou"
                            data-v-bdb05f16="" data-v-d86bfa86="">
                                <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text"
                                value="" placeholder="  请输入搜索关键词，建议2-5字" data-v-d86bfa86="">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="icon items-center cursor-pointer flex-shrink-0 m-0 md:mr-2 text-secondary xiarou-ziyuansou"
                                data-v-d86bfa86="" style="" width="20px" height="20px" viewBox="0 0 24 24"
                                data-v-bd832875="">
                                    <path class="xiarou-ziyuansou" fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39M11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7">
                                    </path>
                                </svg>
                            </div>
                            <i class="flex-[320] xiarou-ziyuansou" data-v-bdb05f16="">
                            </i>
                        </div>
                    </div>
                    <!---->
                    <div class="xiarou-ziyuansou" data-v-bdb05f16="">
                        <!--[-->
                        <div class="header-right-container xiarou-ziyuansou" data-v-72b75d77="">
                            <!--[-->
                            
                            <div is="a" href="<?php echo $url_local;?>"
                            class="header-right-wrapper xiarou-ziyuansou" data-v-72b75d77="">
                                <a href="<?php echo $url_local;?>" rel="nofollow"
                                target="_blank" class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                    <?php echo $url_local_title;?>
                                </a>
                                <!---->
                            </div>
                            <div is="a" href="https://" class="header-right-wrapper xiarou-ziyuansou"
                            data-v-72b75d77="">
                                <a href="https://" rel="nofollow" target="_blank"
                                class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                    <?php echo $url_local_2_title;?>
                                </a>
                                <!---->
                            </div>
                            <?php
                            if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
                                
                                echo '
                                <div is="a" href="../admin" class="header-right-wrapper xiarou-ziyuansou"
                            data-v-72b75d77="">
                                <a href="../admin" rel="nofollow" target="_blank"
                                class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                        登陆后台
                                </a>
                                <!---->
                            </div>
                            ';
}
                            ?>
                            <!--]-->
                        </div>
                        <!---->
                        <!--]-->
                    </div>
                    <!---->
                </div>
                <div id="search-result-header-mobile" class="sticky top-0 py-2 z-[1000] bg-primary-bg flex flex-col items-center w-full px-4 md:hidden flex-none xiarou-ziyuansou"
                ishome="false" data-v-5cb43736="" data-v-c5c727d1="">
                    <div class="relative w-full flex justify-between h-[44px] mb-[14px] md:mb-0 xiarou-ziyuansou"
                    data-v-c5c727d1="">
                        <a href="../" class="truncate flex flex-row items-center justify-center xiarou-ziyuansou"
                        data-v-c5c727d1="">
                            <div class="h-6 xiarou-ziyuansou" data-v-c5c727d1="">
                                <img src="<?php echo $logo;?>"
                                class="w-auto h-full object-contain xiarou-ziyuansou" alt="资源搜">
                            </div>
                            <h1 class="ml-[7px] app-name truncate text-[20px] leading-7 font-bold xiarou-ziyuansou"
                            data-v-c5c727d1="">
                                资源搜
                            </h1>
                        </a>
                       
                    </div>
                   
                    <div id="resource-search-container" class="yp-search yp-search-header xiarou-ziyuansou" data-v-c5c727d1="" data-v-d86bfa86="">
    <form action="../search/" method="get" style="display: flex; align-items: center; width: 100%;">
        <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text"
               name="search" value="<?php ?>" placeholder="  输入完直接回车" 
               style="flex-grow: 1; border: none; padding: 0.5rem; font-size: 1rem;">
        <button type="submit" style="display: none;">搜索</button>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             aria-hidden="true" role="img" class="icon items-center cursor-pointer flex-shrink-0 m-0 md:mr-2 text-secondary xiarou-ziyuansou"
             data-v-d86bfa86="" style="cursor: pointer;" width="20px" height="20px" viewBox="0 0 24 24" data-v-bd832875="">
            <path class="xiarou-ziyuansou" fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39M11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7"></path>
        </svg>
    </form>
</div>

                </div>
                <div id="wrap" class="max-w-[1264px] w-full flex flex-col items-center mx-auto flex-grow px-4 md:px-8 xiarou-ziyuansou"
                data-v-5cb43736="">
                    <!--[-->
                    <!--[-->
                    <!---->
                    <div class="yp-detail xiarou-ziyuansou" data-v-de529291="">
                        <ul class="yp-detail-main-breadcrumb md:hidden flex xiarou-ziyuansou" data-v-de529291="">
                            <!--[-->
                            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../" target="_blank" data-v-de529291="">
                                    首页
                                </a>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../search/&cloud_type=<?php echo $cloud_type;?>" target="_blank"
                                data-v-de529291="">
                                    资源
                                </a>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../search/?cloud_type=<?php echo $cloud_type;?>"
                                target="_blank" data-v-de529291="">
                                    <?php echo $cloud_type_value;?>
                                </a>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                            
                            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../d/<?php echo $post_id;?>"
                                target="_blank" data-v-de529291="">
                                    立即下载
                                </a>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                            <!--]-->
                        </ul>
                        <div class="yp-detail-main xiarou-ziyuansou" data-v-de529291="">
                            <div class="mb-[14px] xiarou-ziyuansou" data-v-de529291="" data-v-7aa9b9fc="">
                                <div class="w-full relative flex flex-row justify-between items-start text-center rounded-[10px] bg-notice-bg border-[1px] border-notice-border py-3 pl-4 pr-[22px] notice-shadow xiarou-ziyuansou"
                                data-v-7aa9b9fc="">
                                    <div id="ring" class="cursor-pointer leading-4 xiarou-ziyuansou" data-v-7aa9b9fc="">
                                        🔔
                                    </div>
                                    <div class="px-5 transition-all leading-4 text-[14px] text-notice-text text-left xiarou-ziyuansou"
                                    data-v-7aa9b9fc="">
                                        资源失效请点击失效反馈，本平台所有资源均免费提供，无任何盈利性质!
                                    </div>
                                    <i class="xiarou-ziyuansou" data-v-7aa9b9fc="">
                                    </i>
                                </div>
                            </div>
                            <div class="yp-detail-main-basic xiarou-ziyuansou" data-v-de529291="">
                                <ul class="yp-detail-main-breadcrumb xiarou-ziyuansou" data-v-de529291="">
                                    <!--[-->
                                    <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                        <a class="xiarou-ziyuansou" href="../" target="_blank" data-v-de529291="">
                                            首页
                                        </a>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                            <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                        <a class="xiarou-ziyuansou" href="../search/?cloud_type=<?php echo $cloud_type;?>" target="_blank"
                                        data-v-de529291="">
                                            资源
                                        </a>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                            <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                        <a class="xiarou-ziyuansou" href="../search/?cloud_type=<?php echo $cloud_type;?>"
                                        target="_blank" data-v-de529291="">
                                            <?php echo $cloud_type_value;?>
                                        </a>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                            <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                            </path>
                                        </svg>
                                    </li>
                                   
                                     <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../d/<?php echo $post_id;?>"
                                target="_blank" data-v-de529291="">
                                    立即下载
                                </a>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                                    <!--]-->
                                </ul>
                                <div class="yp-detail-main-info xiarou-ziyuansou" data-v-de529291="">
                                    <h1 class="yp-detail-main-info-title xiarou-ziyuansou" data-v-de529291="">
                                        <?php echo $post_title;?>
                                    </h1>
                                    <!--[-->
                                    <div class="yp-detail-resource-desc-basic-without-fold yp-detail-resource-desc-basic xiarou-ziyuansou"
                                    data-v-30f629e4="">
                                        <div class="w-full h-full truncate-3 xiarou-ziyuansou" style="height: 0px; --color-yz-md-text: var(--color-result-desc);"
                                        data-v-30f629e4="" data-v-267908a5="">
                                            <div id="md-editor-v-0-0-2-0-0" class="md-editor yz-md-editor-preview md-editor-previewOnly xiarou-ziyuansou"
                                            style="--md-bk-color:var(--color-primary-bg);--md-color:var(--color-yz-md-text);"
                                            data-v-267908a5="">
                                                <!--[-->
                                                <div id="md-editor-v-0-0-2-0-0-preview-wrapper" class="md-editor-preview-wrapper xiarou-ziyuansou">
                                                    <div id="md-editor-v-0-0-2-0-0-preview" class="md-editor-preview default-theme md-editor-scrn xiarou-ziyuansou">
                                                        <p class="xiarou-ziyuansou" data-line="0">
    <?php echo strip_tags($post_content);?>
</p>
                                                    </div>
                                                </div>
                                                <!---->
                                                <!--]-->
                                            </div>
                                        </div>
                                        <i class="yp-detail-resource-desc-fold-icon xiarou-ziyuansou" data-v-30f629e4="">
                                            <svg class="xiarou-ziyuansou" width="14" height="14" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" data-v-30f629e4="">
                                                <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                                </path>
                                            </svg>
                                        </i>
                                    </div>
                                    <div class="my-4 w-full h-[0.5px] bg-[#F0F0F0] md:hidden xiarou-ziyuansou" data-v-30f629e4="">
                                    </div>
                                    <!--]-->
                                    <div class="yp-detail-main-info-text xiarou-ziyuansou" data-v-de529291="">
                                        <!--[-->

                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                溯源渠道: <?php echo $guid;?>
                                            </span>
                                        </div>
                                        
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                资源类型: <?php echo $cloud_type_value;?>
                                            </span>
                                        </div>
                                        
                                        
                                        
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                下载链接: <a href="<?php echo $down_url;?>" class="" target="_blank"><?php echo $down_url;?></a>
                                            </span>
                                        </div>
                                        
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                提取码或解压密码: <?php echo $hidden_content;?>
                                            </span>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>
                                
                               </div>
                           
                        </div>
                        <div class="yp-detail-aside xiarou-ziyuansou" data-v-de529291="">
                            <div class="xiarou-ziyuansou" data-v-de529291="" data-v-847510d1="">
                                <!--[-->
                                <!--[-->
                                <div class="yp-side-contact yp-search-common-block xiarou-ziyuansou" data-v-847510d1=""
                                data-v-fc0ff49f="">
                                    <div class="yp-side-contact-img xiarou-ziyuansou" data-v-fc0ff49f="">
                                        <img class="xiarou-ziyuansou" src="<?php echo $module_p_1_img;?>"
                                        data-v-fc0ff49f="">
                                    </div>
                                    <div class="yp-side-contact-text xiarou-ziyuansou" data-v-fc0ff49f="">
                                        <p title="添加微信，反馈问题" class="yp-side-contact-text-title xiarou-ziyuansou" data-v-fc0ff49f="">
                                            添加微信，反馈问题
                                        </p>
                                        <p title="微信及时反馈问题，方便沟通，请备注 ❤️" class="yp-side-contact-text-tips truncate-2 xiarou-ziyuansou"
                                        data-v-fc0ff49f="">
                                            微信及时反馈问题，方便沟通，请备注 ❤️
                                        </p>
                                    </div>
                                </div>
                               <?php ?>
                                    <?php ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!---->
                 <?php ?>
            </div>
        </div>
    



        
        
        
                

    </body>


</html>
