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
$search_value = isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : '';
$cloud_type_get = isset($_GET['cloud_type']) ? htmlspecialchars($_GET['cloud_type'], ENT_QUOTES, 'UTF-8') : '';
$params = array($search_value, $cloud_type_get);
if (count($params) > 10) {
	echo '<script>alert("搜索较长，请更换关键词！");</script>';
}
if (!empty($search_value) && !preg_match("/^[a-zA-Z0-9一-龯]+$/u", $search_value)) {
	echo '<script>alert("搜索格式不规范，只允许中文、字母、数字！");
    window.location.href = "../search/";
</script>';
	exit();
}
$valid_cloud_types = ['alipan', 'baidu', 'xunlei', 'quark', '123pan', 'lanzou', '115pan', '','other_type'];
if (!empty($cloud_type_get) && !in_array($cloud_type_get, $valid_cloud_types)) {
	echo '<script>alert("网盘类型错误，请检查！");
    window.location.href = "../search/";
</script>';
	exit();
}
// 对搜索值进行基本过滤，避免SQL注入、XSS攻击
$search_value = htmlspecialchars($search_value, ENT_QUOTES, 'UTF-8');
$cloud_type_get = htmlspecialchars($cloud_type_get, ENT_QUOTES, 'UTF-8');
// 确保页面值为整数且大于0
$current_page = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
// 防止非法页面值，保证是正整数
$current_page = max(1, $current_page);
// 每页显示的记录数
$items_per_page = 10;
// 计算起始记录
$offset = ($current_page - 1) * $items_per_page;
?>
<!DOCTYPE html>
<html class="theme-day" lang="zh-CN">
    <head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou">
            <?php echo $search_value . $title;
?>
        </title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="<?php echo $logo;?>">
        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $keywords;?>">
        <meta class="xiarou-ziyuansou" name="description" content="<?php echo $description;?>">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/entry.BMP3qFZ0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/default.B5z-pQNO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FooterStyle2.D4Mv1PiJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Icon.Dan13sfw.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/website.D_-tiCWj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Pendant.y4AbnFSO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/index.CtyTnvQu.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Aside.D6M1Oiat.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FireSvg.DYove8g3.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/ResultItem.DbpK0glK.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/SaveSuc.CD2marx0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/PageCom.CSpJ1xGU.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/ResultEmpty.kCXbZGL6.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/MobileNav.CSGbzlMj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/CategoryNav.CsxyjWPd.css">
        <input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7">
        <script type="text/javascript" src="chrome-extension://dbjbempljhcmhlfpfacalomonjpalpko/scripts/inspector.js">
        </script>
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
    </head>
    <body>
        <div class="xiarou-ziyuansou" id="__nuxt">
            <div class="yp-search-header bg-secondary-bg xiarou-ziyuansou" style="" data-v-5cb43736="">
                <div id="search-result-header" class="yp-header-default xiarou-ziyuansou" data-v-5cb43736=""
                data-v-bdb05f16="">
                    <a href="../" class="yp-header-logo xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="h-[33px] xiarou-ziyuansou" data-v-bdb05f16="">
                            <img src="<?php echo $logo;?>"
                            class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou"
                        data-v-bdb05f16="">
                            <?php echo $title_left;?>
                        </div>
                    </a>
                    <div class="yp-header-search xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="yp-header-search-search-page yp-header-search-basic xiarou-ziyuansou"
                        style="margin: 0px 400px;" data-v-bdb05f16="">
                            <i class="flex-[114] xiarou-ziyuansou" data-v-bdb05f16="">
                            </i>
                            <div id="resource-search-container" class="yp-search undefined yp-search-header yp-header-search-input xiarou-ziyuansou"
                            data-v-bdb05f16="" data-v-d86bfa86="">
                                <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text"
                                value="<?php echo $search_value;?>" placeholder="  请输入搜索关键词" data-v-d86bfa86="">
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
                            <div is="a" href="<?php echo $url_local_2;?>" class="header-right-wrapper xiarou-ziyuansou"
                            data-v-72b75d77="">
                                <a href="<?php echo $url_local_2;?>" rel="nofollow" target="_blank"
                                class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                    <?php echo $url_local_2_title;?>
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
                                <img src="<?php echo $logo;?>"
                                class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                            </div>
                            <h1 class="ml-[7px] app-name truncate text-[20px] leading-7 font-bold xiarou-ziyuansou"
                            data-v-c5c727d1="">
                                <?php echo $title_left;?>
                            </h1>
                        </a>
                    </div>
                    <div id="resource-search-container" class="yp-search yp-search-header xiarou-ziyuansou" data-v-c5c727d1="" data-v-d86bfa86="">
    <form action="../search/" method="get" style="display: flex; align-items: center; width: 100%;">
        <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text"
               name="search" value="<?php echo $search_value;?>" placeholder="  输入完直接回车" 
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
                    <div class="pc-container pc-container-style-one xiarou-ziyuansou" data-v-0d09ce4e="">
                        <div class="yp-search xiarou-ziyuansou" data-v-0d09ce4e="" data-v-3cef0d72="">
                            <div class="yp-search-main xiarou-ziyuansou" curactiveidx="0" data-v-3cef0d72=""
                            data-v-5b8e80f7="">
    <!-- 生成的 HTML 部分 -->
<ul class="yp-search-main-nav yp-search-common-block xiarou-ziyuansou" data-v-5b8e80f7="">
    <li class="<?php if ($cloud_type_get == null) { echo 'yp-search-main-nav-item-active'; } ?> yp-search-main-nav-item xiarou-ziyuansou" title="全部" data-v-5b8e80f7="" onclick="changeCloudType('')">全部</li>
    <?php
    $types = [
        'quark' => '夸克',
        'baidu' => '百度',
        'lanzou' => '蓝奏',
        'alipan' => '阿里',
        '123pan' => '123云盘',
        'xunlei' => '迅雷',
        'other_type' => '其他'
    ];
// 初始化总和变量
$totalCount = 0;
// 遍历所有类型
foreach ($types as $type => $label) {
	// 获取当前类型的数量
	$count = isset($cloudCounts[$type]) ? $cloudCounts[$type] : 0;
	// 累加当前类型的数量到总和
	$totalCount += $count;
	echo '<li class="yp-search-main-nav-item xiarou-ziyuansou" title="' . $label . '" data-v-5b8e80f7="" onclick="changeCloudType(\'' . $type . '\')">
        <div style="display: inline-flex; align-items: center;">
            <img src="';
	if($type == 'lanzou') {
		echo '../assets/lanzou.svg';
	}
	if($type == 'baidu') {
		echo '../assets/baidu.svg';
	}
	if($type == 'alipan') {
		echo'../assets/alipan.ico';
	}
	if($type == '123pan') {
		echo'../assets/yunpan123.svg';
	}
	if($type == 'xunlei') {
		echo'../assets/xunlei.svg';
	}
	if($type == 'quark') {
		echo'../assets/quark.ico';
	}
	if($type == 'other_type') {
		echo '../assets/other.svg';
	}
	if($type == null) {
		echo '../assets/other.svg';
	}
	echo '" alt="" style="width: 23px; margin-right: 5px;">
            ' . $label . ' 
        </div>
      </li>';
}
?>
</ul>
                                <div class="yp-search-main-body xiarou-ziyuansou" data-v-5b8e80f7="">
                                    <div class="yp-search-main-body-header yp-search-common-block yp-search-main-style-one-tip xiarou-ziyuansou"
                                    has-result="true" data-v-5b8e80f7="" data-v-8b5173aa="">
                                        <div class="text-result-top yp-search-main-body-header-text xiarou-ziyuansou"
                                        data-v-8b5173aa="">
                                            <?php
                                            echo '为您找到以下<span class="text-red-500 font-bold xiarou-ziyuansou">'.$search_value.'</span>相关资源，';
?>仅供学习交流，请在24h内删除资源！
                                        </div>
                                    </div>
    <?php
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? max(1, (int)$_GET['p']) : 1;
if (!empty($current_page) && !preg_match("/^[0-9]+$/u", $current_page)) {
	echo '<script>alert("搜索格式不规范，只允许数字！");
    window.location.href = "../search/";
</script>';
	exit();
}
$items_per_page = 10;
$api_url = $dataurl_api."/api/data_api/search_data_api/search_api/index.php";
$api_query = [
    'search' => $search_value,
    'cloud_type' => $cloud_type_get,
    'page' => $current_page,
];
try {
	// 通过cURL请求API
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url . '?' . http_build_query($api_query));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$response = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if ($http_code !== 200 || !$response) {
		throw new Exception("数据源故障");
	}
	$data = json_decode($response, true);
	if (json_last_error() !== JSON_ERROR_NONE) {
		throw new Exception("数据源故障");
	}
	$total_pages = $data['total_pages'] ?? 0;
	$current_page = $data['current_page'] ?? 1;
	$results = $data['results'] ?? [];
	// 输出搜索结果
	echo '<div class="yp-search-result xiarou-ziyuansou">';
	foreach ($results as $row) {
		echo '
       <a href="../d/'.$row['id'].'" target="_blank"
class="yp-search-result-item yp-search-common-block xiarou-ziyuansou" data-v-f1a9747c="">
    <!---->
    <div class="flex overflow-hidden justify-between xiarou-ziyuansou" data-v-f1a9747c="">
        <div class="yp-search-result-item-text xiarou-ziyuansou" data-v-f1a9747c="">
            <h2 class="yp-search-result-item-text-title xiarou-ziyuansou" data-v-f1a9747c="">
                <span class="text-orange-500 xiarou-ziyuansou">
                    '.$row['post_title'].'
                </span>
            </h2>
            <div class="yp-search-result-item-text-desc xiarou-ziyuansou" title="'.$row['post_title'].'"
            data-v-f1a9747c="">
                '.strip_tags($row['post_content']).'
            </div>
            <span class="btn-like red">'.$row['guid'].'</span>
        </div>
        <div class="yp-search-result-item-other xiarou-ziyuansou" data-v-f1a9747c="" style="float:right;">
            <div class="yp-search-result-item-other-category xiarou-ziyuansou" style="background-color :"
            href="" target="_blank" data-v-f1a9747c="">
                ';
		if($row['cloud_type'] == 'lanzou') {
			echo $cloud_type_value =  '蓝奏云';
			$cloud_type_value_img = '../assets/lanzou.svg';
		}
		if($row['cloud_type'] == 'baidu') {
			echo $cloud_type_value =  '百度云';
			$cloud_type_value_img = '../assets/baidu.svg';
		}
		if($row['cloud_type'] == 'alipan') {
			echo $cloud_type_value =  '阿里云盘';
			$cloud_type_value_img = '../assets/alipan.ico';
		}
		if($row['cloud_type'] == '123pan') {
			echo $cloud_type_value =  '123云盘';
			$cloud_type_value_img = '../assets/yunpan123.svg';
		}
		if($row['cloud_type'] == 'xunlei') {
			echo $cloud_type_value =  '迅雷';
			$cloud_type_value_img = '../assets/xunlei.svg';
		}
		if($row['cloud_type'] == 'quark') {
			echo $cloud_type_value =  '夸克云盘';
			$cloud_type_value_img = '../assets/quark.ico';
		}
		if($row['cloud_type'] == 'other_type') {
			echo $cloud_type_value =  '其他';
			$cloud_type_value_img = '../assets/other.svg';
		}
		if($row['cloud_type'] == null) {
			echo $cloud_type_value =  '其他';
			$cloud_type_value_img = '../assets/other.svg';
		}
		echo '
            </div>
            <div class="yp-search-result-item-other-channel xiarou-ziyuansou" data-v-f1a9747c="">
                <!--[-->
                <div class="yp-search-result-item-other-channel-item xiarou-ziyuansou" data-v-f1a9747c="">
                    <img src="'.$cloud_type_value_img.'" alt="" class="w-full h-full object-cover xiarou-ziyuansou"
                    data-v-f1a9747c="">
                </div>
                <!--]-->
            </div>
        </div>
    </div>
</a>        
      ';
	}
	echo '</div>';
	// 输出分页
	echo '<div class="pagination mt-[30px] mb-9 xiarou-ziyuansou" data-v-9da2cb08 data-v-f1a9747c>';
	echo '<div class="flex items-center xiarou-ziyuansou" data-v-9da2cb08>';
	if($row['id'] == null) {
		echo '没有数据，换个关键词试试';
	}
	if($cloud_type_get == 'alipan' || $cloud_type_get == 'quark' || $cloud_type_get == 'baidu' || $cloud_type_get == 'xunlei' || $cloud_type_get == '115pan' || $cloud_type_get == '123pan' || $cloud_type_get == 'lanzou' || $cloud_type_get == 'other_type') {
		// 左箭头（上一页）
		if ($current_page > 1) {
			echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . ($current_page - 1) . '&cloud_type='.$cloud_type_get.'" class="xiarou-ziyuansou" data-v-9da2cb08>
                ⬅️
            </a>';
		}
		// 页码逻辑
		if ($total_pages > 1) {
			if ($current_page > 3) {
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=1&cloud_type='.$cloud_type_get.'" class="xiarou-ziyuansou" data-v-9da2cb08>1</a>';
				echo '<span class="xiarou-ziyuansou" data-v-9da2cb08>...</span>';
			}
			for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++) {
				$active_class = ($i == $current_page) ? 'class="active xiarou-ziyuansou"' : 'class="xiarou-ziyuansou" data-v-9da2cb08';
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . $i . '&cloud_type='.$cloud_type_get.'" ' . $active_class . ' data-v-9da2cb08>' . $i . '</a>';
			}
			if ($current_page < $total_pages - 2) {
				echo '<span class="xiarou-ziyuansou" data-v-9da2cb08>...</span>';
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . $total_pages . '&cloud_type='.$cloud_type_get.'" class="xiarou-ziyuansou" data-v-9da2cb08>' . $total_pages . '</a>';
			}
		}
		// 右箭头（下一页）
		if ($current_page < $total_pages) {
			echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . ($current_page + 1) . '&cloud_type='.$cloud_type_get.'" class="xiarou-ziyuansou" data-v-9da2cb08>
                <svg class="xiarou-ziyuansou" width="18" height="18" viewBox="0 0 12 12" fill="none">
                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z"></path>
                </svg>
            </a>';
		}
	} else {
		// 左箭头（上一页）
		if ($current_page > 1) {
			echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . ($current_page - 1) . '" class="xiarou-ziyuansou" data-v-9da2cb08>
                ⬅️
            </a>';
		}
		// 页码逻辑
		if ($total_pages > 1) {
			if ($current_page > 3) {
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=1" class="xiarou-ziyuansou" data-v-9da2cb08>1</a>';
				echo '<span class="xiarou-ziyuansou" data-v-9da2cb08>...</span>';
			}
			for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++) {
				$active_class = ($i == $current_page) ? 'class="active xiarou-ziyuansou"' : 'class="xiarou-ziyuansou" data-v-9da2cb08';
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . $i . '" ' . $active_class . ' data-v-9da2cb08>' . $i . '</a>';
			}
			if ($current_page < $total_pages - 2) {
				echo '<span class="xiarou-ziyuansou" data-v-9da2cb08>...</span>';
				echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . $total_pages . '" class="xiarou-ziyuansou" data-v-9da2cb08>' . $total_pages . '</a>';
			}
		}
		// 右箭头（下一页）
		if ($current_page < $total_pages) {
			echo '<a href="/search/?search=' . urlencode($search_value) . '&p=' . ($current_page + 1) . '" class="xiarou-ziyuansou" data-v-9da2cb08>
                <svg class="xiarou-ziyuansou" width="18" height="18" viewBox="0 0 12 12" fill="none">
                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z"></path>
                </svg>
            </a>';
		}
	}
	echo '</div>';
	echo '</div>';
}
catch (Exception $e) {
	echo '<p>发生错误：' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>
                                </div>
                            </div>
                            <div class="yp-search-aside xiarou-ziyuansou" data-v-3cef0d72="">
                                <div class="yp-search-aside-basic xiarou-ziyuansou" data-v-3cef0d72="" data-v-847510d1="">
                                    <!--[-->
                                    <!--[-->
                                    <div class="yp-side-contact yp-search-common-block xiarou-ziyuansou" data-v-847510d1=""
                                    data-v-fc0ff49f="">
                                        <div class="yp-side-contact-img xiarou-ziyuansou" data-v-fc0ff49f="">
                                            <img class="xiarou-ziyuansou" src="<?php echo $module_p_1_img;?>" data-v-fc0ff49f="">
                                        </div>
                                        <div class="yp-side-contact-text xiarou-ziyuansou" data-v-fc0ff49f="">
                                            <p title="<?php echo $module_title_1;?>" class="yp-side-contact-text-title xiarou-ziyuansou" data-v-fc0ff49f="">
                                                <?php echo $module_title_1;?>
                                            </p>
                                            <p title="<?php echo $module_p_1;?>️" class="yp-side-contact-text-tips truncate-2 xiarou-ziyuansou"
                                            data-v-fc0ff49f="">
                                                <?php echo $module_p_1;?>
                                            </p>
                                        </div>
                                    </div>
                                    <!--]-->
                                    <!--]-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--]-->
                </div>
                <!---->
                 <?php include('../footer.php');
?>
            </div>
        </div>
       
    </body>
</html>