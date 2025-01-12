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





?>
<!DOCTYPE html>
<html class="theme-day" lang="zh-CN">
    
    <head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou">
            热门资源-<?php echo $title;?>
        </title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="<?php echo $logo;?>">
        
        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $keywords;?>">
        <meta class="xiarou-ziyuansou" name="description" content="<?php echo $description;?>">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/entry.BMP3qFZ0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/default.B5z-pQNO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/FooterStyle2.D4Mv1PiJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/Icon.Dan13sfw.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/website.D_-tiCWj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/Pendant.y4AbnFSO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/_id_.BFC8vAVk.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/Notice.O1KhRlGv.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/FireSvg.DYove8g3.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/Aside.D6M1Oiat.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../d-assets/assets/SaveSuc.CD2marx0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/index.DWkWug2m.css">
        
        <style type="text/css">
            .medium-zoom-overlay{position:fixed;top:0;right:0;bottom:0;left:0;opacity:0;transition:opacity
            .3s;will-change:opacity}.medium-zoom--opened .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}.medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform
            .3s cubic-bezier(.2,0,.2,1)!important}.medium-zoom-image--hidden{visibility:hidden}.medium-zoom-image--opened{position:relative;cursor:pointer;cursor:zoom-out;will-change:transform}
        </style>
        <link href="../d-assets/assets/atom-one-dark.min.css" rel="stylesheet"
        id="md-editor-hlCss">
        <link rel="stylesheet" href="../d-assets/assets/katex.min.css"
        id="md-editor-katexCss">
        <input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7">
    <!--弹窗-->
    <link rel="stylesheet" type="text/css" href="https://cdn.wpon.cn/2023/newtc/css/message.css" />
    <script src="https://cdn.wpon.cn/2023/newtc/js/jquery.min.js"></script>
    <script src="https://cdn.wpon.cn/2023/newtc/js/message.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            function loading_data_success() {
            $.message({
                type: 'success',
                content: "获取成功"
            });
        }
        function loading_data() {
            $.message({
                type: 'warning',
                content: "获取中，请稍后"
            });
        }
        
        function loading_data_error() {
            $.message({
                type: 'warning',
                content: "获取失败，数据源可能故障"
            });
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
                            class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou"
                        data-v-bdb05f16="">
                            <?php echo $title_left;?>
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


<div class="xiarou-ziyuansou" data-v-3f764ca5="">
    <div class="yp-search-rank-header xiarou-ziyuansou" data-v-3f764ca5="">
        <ul class="yp-detail-main-breadcrumb xiarou-ziyuansou" data-v-3f764ca5="">
            <!--[-->
            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-3f764ca5="">
                <a class="xiarou-ziyuansou" href="../" target="_blank" data-v-3f764ca5="">
                    首页
                </a>
                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-3f764ca5="">
                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                    </path>
                </svg>
            </li>
            <li class="yp-detail-main-breadcrumb-item xiarou-ziyuansou" data-v-3f764ca5="">
                <a class="xiarou-ziyuansou" href="/remen" target="_blank" data-v-3f764ca5="">
                    热门资源
                </a>
                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="breadcrumb-item-icon xiarou-ziyuansou" data-v-3f764ca5="">
                    <path class="fill-current xiarou-ziyuansou" d="M4.84474 9.34375L4.15531 8.65432L6.81059 5.99904L4.15531 3.34375L4.84474 2.65432L8.18945 5.99904L4.84474 9.34375Z">
                    </path>
                </svg>
            </li>
            <!--]-->
        </ul>
        
        <br>
        
    </div>
    <table class="yp-rank-hot-table yp-rank-search-table xiarou-ziyuansou" total="0"
    data-v-3f764ca5="" data-v-edfa7348="">
        <tbody class="xiarou-ziyuansou result-container-remen" data-v-edfa7348=""><div id="loading_remen" style="display: none;">加载中...请耐心等候！若长时间未加载数据请刷新页面！</div></tbody>
    </table>
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
                                            <?php echo $module_title_1;?>
                                        </p>
                                        <p title="<?php echo $module_p_1;?>" class="yp-side-contact-text-tips truncate-2 xiarou-ziyuansou"
                                        data-v-fc0ff49f="">
                                            <?php echo $module_p_1;?>
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
    


<style>
    .yp-rank-hot-table[data-v-edfa7348] {
    background-color: var(--color-primary-bg);
    border-radius: .5rem;
    color: var(--color-primary-text);
    width: 100%;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    box-shadow: 0 0 rgba(0,0,0,0),0 0 rgba(0,0,0,0),0 0 rgba(0,0,0,0);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)
}

@media (min-width: 992px) {
    .yp-rank-hot-table[data-v-edfa7348] {
        --tw-shadow:0px 4px 8px 0px var(--color-result-shadow);
        --tw-shadow-colored: 0px 4px 8px 0px var(--tw-shadow-color);
        box-shadow: 0 0 rgba(0,0,0,0),0 0 rgba(0,0,0,0),var(--tw-shadow);
        box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348] {
    border-bottom-color: var(--color-primary-border);
    border-bottom-width: 1px;
    cursor: pointer;
    display: flex;
    position: relative;
    transition-duration: .3s;
    transition-property: all;
    transition-timing-function: cubic-bezier(.4,0,.2,1)
}

.yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348]:hover {
    background-color: var(--color-table-tr-hover)
}

.yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348] {
    align-items: center;
    display: grid;
    min-height: 50px;
    width: 100%
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348] {
        min-height:62px
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348] {
    grid-auto-flow: column;
    grid-template-columns: 110fr 690fr 212fr 188fr
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348]:last-child {
        border-width:0
    }
}

@media (max-width: 991px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr[data-v-edfa7348] {
        grid-template-columns:auto 1fr
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr td[data-v-edfa7348] {
    align-items: center;
    display: flex;
    font-size: 15px;
    line-height: 22px;
    padding-left: 1rem;
    padding-right: 1rem
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-first-col[data-v-edfa7348] {
    font-size: 14px;
    padding: 0
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr .td-first-col[data-v-edfa7348] {
        padding-left:30px
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-first-col .td-first-col-index[data-v-edfa7348] {
    --tw-text-opacity: 1;
    color: #878b9a;
    color: rgb(135 139 154/var(--tw-text-opacity))
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-second-col[data-v-edfa7348] {
    padding-bottom: 14px;
    padding-top: 14px
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr .td-second-col[data-v-edfa7348] {
        padding-bottom:1.25rem;
        padding-top: 1.25rem
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-third-col[data-v-edfa7348] {
    display: none;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr .td-third-col[data-v-edfa7348] {
        display:block
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-content-end[data-v-edfa7348] {
    display: none;
    justify-content: flex-end;
    padding-right: 2.5rem
}

@media (min-width: 992px) {
    .yp-rank-hot-table .yp-rank-hot-table-tr .td-content-end[data-v-edfa7348] {
        display:flex
    }
}

.yp-rank-hot-table .yp-rank-hot-table-tr .td-content-end img[data-v-edfa7348] {
    height: 26px;
    margin-left: .5rem;
    width: 26px
}

.yp-rank-hot-table .yp-rank-hot-table-tr .yp-rank-hot-table-tr-link[data-v-edfa7348] {
    bottom: 0;
    height: 100%;
    left: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%
}

.yp-rank-hot-table .use-default-icon[data-v-edfa7348] {
    filter: none;
    filter: var(--filter-dark,none)
}

.yp-rank-hot-table-home[data-v-edfa7348] {
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    box-shadow: 0 0 rgba(0,0,0,0),0 0 rgba(0,0,0,0),0 0 rgba(0,0,0,0);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)
}

.yp-rank-search-table .yp-rank-hot-table-tr[data-v-edfa7348] {
    grid-template-columns: 100fr 565fr 115fr
}

.yp-rank-search-table .yp-rank-hot-table-tr .td-content-end[data-v-edfa7348] {
    align-items: flex-start;
    font-size: 13px;
    font-weight: 500;
    justify-content: flex-start;
    line-height: .75rem;
    overflow: hidden
}

.yp-rank-table-use-rate .yp-rank-hot-table-tr[data-v-edfa7348] {
    grid-template-columns: 100fr 505fr 175fr
}

.yp-rank-table-use-rate .yp-rank-hot-table-tr .td-content-end[data-v-edfa7348] {
    align-items: flex-start;
    font-size: 13px;
    font-weight: 500;
    justify-content: flex-start;
    line-height: .75rem;
    overflow: hidden
}

.yp-rank-table-only-title .yp-rank-hot-table-tr[data-v-edfa7348] {
    grid-template-columns: 100fr 680fr
}

.yp-rank-table-only-title .yp-rank-hot-table-tr .td-content-end[data-v-edfa7348] {
    align-items: flex-start;
    font-size: 13px;
    font-weight: 500;
    justify-content: flex-start;
    line-height: .75rem;
    overflow: hidden
}

</style>
        
        
        <script>

document.addEventListener('DOMContentLoaded', function () {
    loading_data();
                const fetchData = async () => {
                    const apiUrl = '<?php echo $dataurl_api;?>/api/data_api/index_data_remen_api/';
                    const resultContainer = document.querySelector('.result-container-remen');
                    resultContainer.innerHTML = ''; // 清空内容
            
                    // 显示加载动画
                    const loading = document.getElementById('loading_remen');
                    loading.style.display = 'block';
            
                    try {
                        const response = await fetch(apiUrl);
                        if (!response.ok) {
                            throw new Error('网络响应错误');
                        }
                        const data = await response.json();
                        // 隐藏加载动画
                        loading.style.display = 'none';
                        loading_data_success();
            
                        if (data.status === 'success') {
                            data.data.forEach((item, index) => {
                                const listItem = `
                                <tr class="yp-rank-hot-table-tr xiarou-ziyuansou" data-v-edfa7348="">
                <td class="text-red-500 opacity-[100-0] td-first-col xiarou-ziyuansou" data-v-edfa7348="">
                    <span class="md:block hidden xiarou-ziyuansou" data-v-edfa7348="">
                        <div class="yp-rank-index yp-rank-index-first-three td-first-col-index xiarou-ziyuansou"
                        index="${index + 1}" data-v-edfa7348="" data-v-5fa7af37="">
                            <div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">
                            ${index + 1}
                            </div>
                        </div>
                    </span>
                    <span class="md:hidden block xiarou-ziyuansou" data-v-edfa7348="">
                        <div class="yp-rank-index yp-rank-index-first-three yp-rank-index-hot td-first-col-index xiarou-ziyuansou"
                        index="${index + 1}" data-v-edfa7348="" data-v-5fa7af37="">
                            <div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">
                                ${index + 1}
                            </div>
                        </div>
                    </span>
                </td>
                <td class="td-second-col xiarou-ziyuansou" data-v-edfa7348="">
                    ${item.post_title}
                    <a class="yp-rank-hot-table-tr-link xiarou-ziyuansou" href="../d/${item.id}"
                    target="_blank" title="${item.post_title}" data-v-edfa7348="">
                        ${item.post_title}
                    </a>
                </td>
                <!---->
                <td class="td-content-end xiarou-ziyuansou" data-v-edfa7348="">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mr-1 flex-none xiarou-ziyuansou" data-v-edfa7348="">
                        <path class="xiarou-ziyuansou" d="M5.57973 16.35C4.57036 14.35 5.10161 13.2 5.89848 12.15C6.74848 10.95 6.96098 9.8 6.96098 9.8C6.96098 9.8 7.65161 10.6 7.38598 11.9C8.55473 10.65 8.76723 8.65 8.60786 7.9C11.2641 9.65 12.4329 13.5 10.8922 16.3C19.0735 11.9 12.911 5.35 11.8485 4.65C12.2204 5.4 12.2735 6.65 11.5297 7.25C10.3079 2.85 7.27973 2 7.27973 2C7.65161 4.25 6.00473 6.7 4.41098 8.55C4.35786 7.65 4.30473 7.05 3.77348 6.15C3.66723 7.8 2.33911 9.1 1.96723 10.75C1.48911 13 2.33911 14.6 5.57973 16.35Z"
                        fill="#FF5169">
                        </path>
                    </svg>
                    <div class="leading-[19px] truncate xiarou-ziyuansou" data-v-edfa7348="">
                        ${item.view}
                    </div>
                </td>
            </tr>`;
                                resultContainer.insertAdjacentHTML('beforeend', listItem);
                            });
                        } else {
                            loading_data_error();
                            resultContainer.innerHTML = `<p>错误：${data.message}</p>`;
                        }
                    } catch (error) {
                        loading_data_error();
                        loading.style.display = 'none'; // 隐藏加载动画
                        resultContainer.innerHTML = `<p>发生错误：${error.message}</p>`;
                    }
                };
            
                // 调用函数
                fetchData();
            });



</script>
      
<?php include('../footer.php');?>
    </body>


</html>