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

include('../config.php');
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
// 获取当前URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$full_url = $protocol . $host . $request_uri;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
}
// 获取当前日期
$current_date = date('Y-m-d');
// 查询log表，统计指定日期和IP的次数
$sql = "SELECT COUNT(*) AS visit_count FROM logs WHERE ip_address = '$user_ip' AND DATE(date_only) = '$current_date'";
$result = $conn->query($sql);
// 检查查询是否成功
if ($result->num_rows > 0) {
	// 获取查询结果
	$row = $result->fetch_assoc();
	$visit_count = $row['visit_count'];
	$remainingDownloads_count = 10 - $visit_count;
	if ($visit_count > 10) {
		$remainingDownloads = 0;
	} else {
		$remainingDownloads = $remainingDownloads_count;
	}
} else {
	$remainingDownloads = 10;
}
$conn->close();
$date = date("Y-m-d");
$search_value = $_GET['data_id']?:1;
$url = $dataurl_api."/api/data_api/d_data_update_view/";
$data = ['search_value' => $search_value,'user_ip' => $user_ip];
$query_string = http_build_query($data);
$final_url = $url . '?' . $query_string;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $final_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if (curl_errno($ch)) {
	echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);
if (!empty($search_value) && !preg_match("/^[a-zA-Z0-9一-龯]+$/u", $search_value)) {
	echo '<script>alert("格式不规范！");
    window.history.back();
</script>';
	// header('Location: ../search/');
	exit();
}
if ($search_value == null) {
	header('Location: ../');
	exit();
}
function aes256_encrypt($data, $key) {$iv = openssl_random_pseudo_bytes(16);	$encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);	return base64_encode($encrypted . '::' . $iv);}$encrypted_value = aes256_encrypt($search_value, $key);

?>
<!DOCTYPE html>
<html class="theme-day" lang="zh-CN">
    <head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou" id="title"></title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="../assets/logo.svg">
        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $keywords;?>">
        <meta class="xiarou-ziyuansou" name="description" content="<?php echo $description;?>">
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
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>                              
        <style type="text/css">
            .medium-zoom-overlay {
	position:fixed;
	top:0;
	right:0;
	bottom:0;
	left:0;
	opacity:0;
	transition:opacity
	            .3s;
	will-change:opacity
}
.medium-zoom--opened .medium-zoom-overlay {
	cursor:pointer;
	cursor:zoom-out;
	opacity:1
}
.medium-zoom-image {
	cursor:pointer;
	cursor:zoom-in;
	transition:transform
	            .3s cubic-bezier(.2,0,.2,1)!important
}
.medium-zoom-image--hidden {
	visibility:hidden
}
.medium-zoom-image--opened {
	position:relative;
	cursor:pointer;
	cursor:zoom-out;
	will-change:transform
}
</style>
         <style>.download_url {
	display:inline-block;
	font-weight:400;
	text-align:center;
	white-space:nowrap;
	vertical-align:middle;
	user-select:none;
	border:1px solid transparent;
	padding:0.375rem 0.75rem;
	font-size:1rem;
	line-height:1.5;
	border-radius:0.25rem;
	color:#fff;
	background-color:#007bff;
	border-color:#007bff;
	text-decoration:none;
	transition:color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
}
.download_url:hover {
	color:#fff;
	background-color:#0056b3;
	border-color:#004085;
	text-decoration:none;
}
.download_url:focus {
	color:#fff;
	background-color:#0056b3;
	border-color:#004085;
	outline:0;
	box-shadow:0 0 0 0.2rem rgba(38,143,255,0.5);
}
.download_url:active {
	color:#fff;
	background-color:#004085;
	border-color:#002752;
	text-decoration:none;
}
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
            function loading_data_success() {
	$.message( {
		type: 'success',
		                content: "获取成功"
	}
	);
}
function loading_data() {
	$.message( {
		type: 'warning',
		                content: "获取中，请稍后"
	}
	);
}
function loading_data_error() {
	$.message( {
		type: 'warning',
		                content: "获取失败，数据源可能故障"
	}
	);
}
function copy_success() {
	$.message( {
		type: 'success',
		                content: "复制成功"
	}
	);
}
function loading_download() {
	$.message( {
		type: 'warning',
		                content: "获取中，请稍后"
	}
	);
}
function loading_download_success() {
	$.message( {
		type: 'success',
		                content: '<?php if($remainingDownloads == 0){ echo'今日下载次数已用完';}else{ echo '获取资源成功！';}?>'
	}
	);
}
// data是需要复制的内容
function copyFunction(self) {
	var timer = null;
	clearTimeout(timer);
	var data = self.getAttribute('copy_data');
	console.log(data);
	copy_success();
	// alert('复制成功！');
	let copyInput = document.createElement("input");
	//创建input元素
	document.body.appendChild(copyInput);
	//向页面底部追加输入框
	copyInput.setAttribute("value", data);
	//添加属性，将需要复制的内容赋值给input元素的value属性
	copyInput.select();
	//选择input元素
	var res = document.execCommand("Copy", false, null);
	//执行复制命令(指令参数, 交互方式参数如果是true的话将显示对话框, 动态参数一般为一可用值或属性值)
	//复制之后再删除元素，否则无法成功赋值
	document.body.removeChild(copyInput);
	//删除动态创建的节点
	document.getElementsByClassName("copySuc")[0].style.display = "block"
	                            timer = setTimeout(function copySucHide() {
		document.getElementsByClassName("copySuc")[0].style.display = "none"
	}
	, 1000);
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
                            <img src="../assets/logo.svg"
                            class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou"
                        data-v-bdb05f16="">
                            <?php echo $title_left;
?>
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
                                    <?php echo $url_local_title;
?>
                                </a>
                                <!---->
                            </div>
                            <div is="a" href="<?php echo $url_local_2;?>" class="header-right-wrapper xiarou-ziyuansou"
                            data-v-72b75d77="">
                                <a href="<?php echo $url_local_2;?>" rel="nofollow" target="_blank"
                                class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                    <?php echo $url_local_2_title;
?>
                                </a>
                                <!---->
                            </div>
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
                                <img src="../assets/logo.svg"
                                class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                            </div>
                            <h1 class="ml-[7px] app-name truncate text-[20px] leading-7 font-bold xiarou-ziyuansou"
                            data-v-c5c727d1="">
                                <?php echo $title_left;
?>
                            </h1>
                        </a>
                    </div>
                    <div id="resource-search-container" class="yp-search yp-search-header xiarou-ziyuansou" data-v-c5c727d1="" data-v-d86bfa86="">
    <form action="../search/" method="get" style="display: flex; align-items: center; width: 100%;">
        <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text"
               name="search" value="" placeholder="  输入完直接回车" 
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
                                <p class="xiarou-ziyuansou" id="cloud-type-value_s"></p>
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                    </path>
                                </svg>
                            </li>
                            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                <a class="xiarou-ziyuansou" href="../d/<?php echo $id;?>"
                                target="_blank" data-v-de529291="">
                                    <?php echo $post_title;
?>
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
                                        <?php echo $Notice;
?>
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
                                        <p class="xiarou-ziyuansou" id="cloud-type-value_r"></p>
                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="breadcrumb-item-icon xiarou-ziyuansou" data-v-de529291="">
                                            <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-de529291="">
                                        <a class="xiarou-ziyuansou" href="../d/<?php echo $id;?>"
                                        target="_blank" data-v-de529291="">
                                            <?php echo $post_title;
?>
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
                                    <h1 class="yp-detail-main-info-title xiarou-ziyuansou" data-v-de529291="" id="post-title">
                                        <div id="loading" style="display: none;">加载中...</div>
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
    <?php echo strip_tags($post_content);
?>
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
                                                浏览次数:
                                            </span>
                                             <p class="xiarou-ziyuansou" data-line="0" id="view"></p>
                                        </div>
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                下载次数:
                                            </span>
                                             <p class="xiarou-ziyuansou" data-line="0" id="download-view"></p>
                                        </div>
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                资源类型:
                                            </span>
                                             <p class="xiarou-ziyuansou" data-line="0" id="cloud-type-value"></p>
                                        </div>
                                            <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                溯源渠道:
                                            </span>
                                                <p class="xiarou-ziyuansou" data-line="0" id="post-guid">
                                                            </p>
                                        </div>
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                资源描述:
                                            </span>
                                            <div class="w-full h-full yp-detail-main-info-description xiarou-ziyuansou"
                                            style="--color-yz-md-text:var(--color-result-desc);" data-v-de529291=""
                                            data-v-267908a5="">
                                                <div id="md-editor-v-0-0-2-0-1" class="md-editor yz-md-editor-preview md-editor-previewOnly xiarou-ziyuansou"
                                                style="--md-bk-color:var(--color-primary-bg);--md-color:var(--color-yz-md-text);"
                                                data-v-267908a5="">
                                                    <!--[-->
                                                    <div id="md-editor-v-0-0-2-0-1-preview-wrapper" class="md-editor-preview-wrapper xiarou-ziyuansou">
                                                        <div id="md-editor-v-0-0-2-0-1-preview" class="md-editor-preview default-theme md-editor-scrn xiarou-ziyuansou">
                                                            <p class="xiarou-ziyuansou" data-line="0" id="post-content">
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <!--]-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                更新时间:
                                            </span>
                                             <p class="xiarou-ziyuansou" data-line="0" id="post-date">
                                                            </p>
                                        </div>
                                        <div class="yp-detail-main-info-text-item xiarou-ziyuansou" data-v-de529291="">
                                            <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-de529291="">
                                                今日可下载:<?php echo $remainingDownloads;
?>次
                                            </span>
                                        </div>
                                        <!--]-->
                                    </div>
                                </div>
                                <div class="yp-detail-main-info-share xiarou-ziyuansou" data-v-de529291="" onclick="copyFunction(this)"  copy_data="<?php echo '我给你分享了个资源，链接地址：'.$full_url.'，快来看看吧~'; ?>">
                                    <i class="xiarou-ziyuansou" data-v-de529291="">
                                        <svg class="xiarou-ziyuansou" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" data-v-de529291="">
                                            <path class="fill-current stroke-current xiarou-ziyuansou" d="M8.26316 2.69922L13 7.77614L8.26316 12.571V9.46845C4.57895 9.46845 3 13.6992 3 13.6992C3 8.90435 4.31579 5.80178 8.26316 5.80178V2.69922Z"
                                            fill="#424954" stroke="#424954" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </i>
                                </div>
                            </div>
                            <div class="yp-detail-main-source-basic mt-[14px] xiarou-ziyuansou" data-v-de529291="">
                                <div class="yp-detail-main-info-text xiarou-ziyuansou" data-v-de529291="" data-v-3fb0bdd5="">
                                    <div class="yp-detail-main-info-text-item yp-detail-main-info-text-item-resource xiarou-ziyuansou"
                                    multiple-resource="false" data-v-3fb0bdd5="">
                                        <span class="yp-detail-main-info-text-item-label xiarou-ziyuansou" data-v-3fb0bdd5="">
                                            资源地址:
                                        </span>
                                        <div class="yp-detail-main-info-text-item-value yp-detail-main-info-text-item-value-resource xiarou-ziyuansou"
                                        resource-num="1" data-v-3fb0bdd5="">
                                            <!--[-->
                                            <div class="item-value-resource-type xiarou-ziyuansou" data-v-3fb0bdd5="">
                                                <div class="item-value-resource-type-info xiarou-ziyuansou" data-v-3fb0bdd5="">
                                                    <img class="item-value-resource-type-info-img xiarou-ziyuansou" src="../assets/jiazai-3.svg"
                                                     id="cloud-type-value-img" alt="" data-v-3fb0bdd5="">
                                                    <p class="xiarou-ziyuansou" id="cloud-type-value_t"></p>
                                                </div>
                                                <ul class="resource-type-item xiarou-ziyuansou" data-v-3fb0bdd5="">
                                                    <li class="xiarou-ziyuansou" style="border-color:#0e60ff;color:#0e60ff;--resource-color-hover-bg:#eef4ff;"
                                                    data-v-3fb0bdd5="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        aria-hidden="true" role="img" class="icon xiarou-ziyuansou" data-v-3fb0bdd5=""
                                                        style="" width="12px" height="12px" viewBox="0 0 16 16" data-v-bd832875="">
                                                            <g class="xiarou-ziyuansou" fill="currentColor">
                                                                <path class="xiarou-ziyuansou" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5">
                                                                </path>
                                                                <path class="xiarou-ziyuansou" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                   <span class="xiarou-ziyuansou" data-v-3fb0bdd5="" id="download_data">
                                                            点击获取
                                                        </span>
                                                    </li>
                                                    <li class="ml-3 xiarou-ziyuansou" style="border-color:#4f4545;color:#2c2323;--resource-color-hover-bg:#f6f6f6;"
                                                    data-v-3fb0bdd5="">
                                                        <svg class="xiarou-ziyuansou" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" data-v-3fb0bdd5="" data-v-89ce5aac="">
                                                            <path class="xiarou-ziyuansou" d="M10.7617 8.25078V2.25078C10.7617 1.38093 10.0566 0.675781 9.18672 0.675781H5.24922V1.57578H9.18672C9.55951 1.57578 9.86172 1.87799 9.86172 2.25078V8.25078H10.7617ZM8.06172 2.55079C8.51735 2.55079 8.88672 2.92015 8.88672 3.37579V10.1258C8.88672 10.5814 8.51735 10.9508 8.06172 10.9508H2.62422C2.16858 10.9508 1.79922 10.5814 1.79922 10.1258V3.37579C1.79922 2.92015 2.16858 2.55079 2.62422 2.55079H8.06172ZM7.98672 10.0508V3.45079H2.69922V10.0508H7.98672Z"
                                                            fill="#2C2323" data-v-89ce5aac="">
                                                            </path>
                                                        </svg>
                                                        <span class="xiarou-ziyuansou"  onclick="copyFunction(this)"  copy_data="<?php echo '我给你分享了个资源，链接地址：'.$full_url.'，快来看看吧~'; ?>
" data-v-3fb0bdd5="">
                                                            复制
                                                        </span>
                                                    </li>
<li class="ml-3 xiarou-ziyuansou" style="border-color: #34dd28;color: #34dd28;--resource-color-hover-bg:#fff8f8;" data-v-3fb0bdd5="">
    <svg t="1736529223028" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="9166" width="16" height="16"><path d="M380.1 126.9c-102.7 5-186.7 90.4-190.2 193.1-2 59.4 21.8 113.3 61.1 151.3 20.9 20.2 56 9.7 63.5-18.4 3.5-13.2 0.2-27.5-9.7-36.9-23.8-22.8-38.5-55.1-38-90.6 0.9-63.4 52.3-117.5 115.6-121.4 56.7-3.5 105.9 31.7 123.8 81.6 4.5 12.6 14.8 22.3 28 24.5l3.3 0.5c28.5 4.8 51.2-22.9 41.6-50.2-28.5-80.9-107.5-137.9-199-133.5z" fill="#00C569" p-id="9167"></path><path d="M814.3 527.8L410.3 292c-14.5-8.5-30.8-6.7-42.8 1.3-12 8-19.8 22.4-17.5 39l63.8 463.4c4.2 30.3 38.4 44.1 62.2 28.2 2.4-1.6 4.8-3.6 7-5.9l111.3-116.6 119.5 178.7c11.8 17.7 35.8 22.4 53.5 10.6 17.7-11.8 22.4-35.8 10.6-53.5L658.4 658.7l150.2-58.4c2.9-1.1 5.6-2.6 8.1-4.2 23.7-15.9 24-52.9-2.4-68.3z m-119.6 34L602 597.9c-8 3.1-15.6 7.1-22.7 11.8-7.1 4.8-13.7 10.3-19.6 16.5l-68.7 72c-4.5 4.7-12.4 2.1-13.3-4.3l-38.8-281.5c-0.9-6.4 6-11 11.6-7.8l245.4 143.2c5.5 3.4 4.9 11.7-1.2 14z" fill="#111111" p-id="9168"></path></svg><span class="feedback-btn" id="cloud_type_test">
            检测资源
        </span></li>
                                         </ul>
                                            </div>
                                            <!--]-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="yp-detail-main-recommend-resource yp-search-common-block yp-duanjusoubacom"
data-v-de529291="">
    <div class="recommend-resource-header yp-duanjusoubacom" data-v-de529291="">
        <div class="recommend-resource-header-title yp-duanjusoubacom" data-v-de529291="">
            <img class="yp-duanjusoubacom" src="" alt="" data-v-de529291="">
            <p class="yp-duanjusoubacom" data-v-de529291="">
                历史检测记录
            </p>
        </div>
    </div>
    <div class="recommend-resource-list yp-duanjusoubacom" data-v-de529291="" id="d_statustest">
        <div id="loading_test" style="display: none;">加载中...</div>
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
                                        <p title="<?php echo $module_title_1;?>" class="yp-side-contact-text-title xiarou-ziyuansou" data-v-fc0ff49f="">
                                            <?php echo $module_title_1;
?>
                                        </p>
                                        <p title="<?php echo $module_p_1;?>" class="yp-side-contact-text-tips truncate-2 xiarou-ziyuansou"
                                        data-v-fc0ff49f="">
                                            <?php echo $module_p_1;
?>
                                        </p>
                                    </div>
                                </div>
                              <!--右侧栏-->
                            </div>
                        </div>
                    </div>
                    <!--底部-->
                </div>
                <!---->
            </div>
        </div>
    <div id="modaldiv" data-v-abe94a57="" class="empty-model opacity-100" icon="'.$cloud_type_value_img.'"
panname="'.$cloud_type_value.'" usecopy="false" usegotopage="0" leadtomobileconfig="[object Object]"
style="z-index: 2000; display: none;">
    <div data-v-abe94a57="" class="empty-modal-basic empty-modal-active" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div data-v-3ea843af="" class="sm:px-5 px-3 sm:pb-5 pb-3 pt-[34px] bg-notice-bg rounded-2xl relative sm:max-w-[500px] max-w-[320px] overflow-hidden">
            <div data-v-3ea843af="" class="source-modal-basic">
            </div>
            <i data-v-3ea843af="" class="close-icon absolute rounded-full top-3 right-[14px] cursor-pointer hover:scale-[1.1] transition-all text-primary-text">
    <button id="closedownload_button">关闭</button>
</i>
            <div data-v-3ea843af="" class="text-[13px] flex items-center flex-none relative -top-2 h-3 font-medium text-result-desc">
                <img data-v-3ea843af="" class="w-5 h-5 mr-1 object-contain" src=""
                alt="" id="cloud-type-value-img_alert">
                <p class="xiarou-ziyuansou" data-v-3ea843af="" id="cloud-type-value_alert">
                </p>
            </div>
            <p data-v-3ea843af=""
            class="w-full font-medium sm:text-[18px] text-[16px] leading-[26px] text-primary-text text-center sm:mb-8 mb-4 px-[18px] relative" id="post-title-alert">
            </p>
            <div data-v-3ea843af="" class="flex flex-col justify-center relative items-center px-[67px] sm:pb-7 pb-3">
                <form action="/download" method="POST" target="_blank">
                    <input type="hidden" name="aes256_post" value="<?php echo $encrypted_value;?>">
                    <input type="submit" value="立即跳转" class="download_url">
                </form>
                <p></p>
            </div>
            <div data-v-3ea843af="" class="w-full relative flex flex-row justify-between items-start text-center rounded-[10px] bg-notice-bg border-[1px] border-notice-border py-2 px-[10px] notice-shadow"><div data-v-3ea843af="" class="source-modal-declaration transition-all leading-[22px] text-[14px] text-modal-declaration-text text-left whitespace-pre-wrap"><span data-v-3ea843af="" id="ring" class="leading-[22px]">🔔</span> <span data-v-3ea843af="" class="text-[#FF5169]">声明：</span>全站链接通过蜘蛛程序收集自网盘分享链接，以非人工方式自动生成，网站本身不储存、复制、传播、控制编辑任何网盘文件，也不提供下载服务，其链接跳转至官方网盘，文件的有效性和安全性需要您自行判断。
本站遵守相关法律法规，坚决杜绝一切违规不良信息，如您发现任何涉嫌违规的网盘信息，请立即向网盘官方网站举报
本站作为非经营性网站，所有服务仅供学习交流使用，无任何收费请求，切勿上当支付。
本站资源仅供研究学习请勿商用以及产生法律纠纷本站概不负责！
</div><i data-v-3ea843af=""></i></div>
        </div>
    </div>
</div>
<?php include('../footer.php');
?>
    </body>
</html>
