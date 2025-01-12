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

?>
<!DOCTYPE html>
<html class="theme-day" lang="zh-CN">
    
    <head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou">
        <?php echo $title;?>
        </title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="<?php echo $logo;?>">

        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $keywords;?>">
        <meta class="xiarou-ziyuansou" name="description" content="<?php echo $description;?>">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/entry.BMP3qFZ0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/index.YjTv_RHj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/SpIndex.DBgkGSBF.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/PageCom.CSpJ1xGU.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Icon.Dan13sfw.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/website.D_-tiCWj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/FireSvg.DYove8g3.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Loading.Bn6jPpTJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Pagination.DtFhuOin.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Notice.O1KhRlGv.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/CategoryNav.CsxyjWPd.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Table.72xskwfL.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/MobileNav.CSGbzlMj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/default.B5z-pQNO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/FooterStyle2.D4Mv1PiJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="./assets/Pendant.y4AbnFSO.css">

        <input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7">
       
        <style type="text/css">
            .medium-zoom-overlay{position:fixed;top:0;right:0;bottom:0;left:0;opacity:0;transition:opacity
            .3s;will-change:opacity}.medium-zoom--opened .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}.medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform
            .3s cubic-bezier(.2,0,.2,1)!important}.medium-zoom-image--hidden{visibility:hidden}.medium-zoom-image--opened{position:relative;cursor:pointer;cursor:zoom-out;will-change:transform}
        </style>
        <style>


        .container {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .category {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 390px;
            border-radius: .5rem;
            border-width: 1px;
            overflow: hidden;
            position: relative;
            --tw-border-opacity: 1;
            border-color: #e4e4e4;
            border-color: rgb(228 228 228/var(--tw-border-opacity));
        }

        .category h2 {
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .category h2 .icon {
            display: flex;
            align-items: center;
        }

        .category h2 .icon img {
            width: 20px;
            margin-right: 5px;
        }

        .category ul {
            list-style: none;
        }

        .category ul li {
            display: flex;
            align-items: center;
            margin: 8px 0;
            font-size: 14px;
        }

        .category ul li .circle {
            width: 20px;
            height: 20px;
            /*border: 2px solid red;*/
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            /*color: red;*/
            font-size: 12px;
            font-weight: bold;
        }

        .category ul li span {
            flex: 1;
        }

        .category ul li a {
            text-decoration: none;
            color: #333;
        }

        .category ul li a:hover {
            text-decoration: underline;
        }

        .category h2 a {
            text-decoration: none;
            font-size: 14px;
            color: #888;
        }

        .category h2 a:hover {
            color: #000;
        }
        
        
/* 响应式设计：在小屏幕上调整为单列 */
@media (max-width: 768px) {
    .container {
        flex-wrap: wrap;
    }
    .category {
        flex: 1 1 100%; /* 每列占满宽度 */
    }
        </style>       
        
    </head>
    
    <body class="bg-primary-bg">
        <div class="xiarou-ziyuansou" id="__nuxt">
            <!--[-->
            <div class="yp-search-header xiarou-ziyuansou" style="" data-v-5cb43736="">
                <div id="search-result-header" class="yp-header-default xiarou-ziyuansou" data-v-5cb43736=""
                data-v-bdb05f16="">
                    <a href="../" class="yp-header-logo xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="h-[33px] xiarou-ziyuansou" data-v-bdb05f16="">
                            <img src="<?php echo $logo;?>" class="w-auto h-full object-contain xiarou-ziyuansou"
                            alt="<?php echo $title_left;?>">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou" data-v-bdb05f16=""><?php echo $title_left;?></div>
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
                            <!--<div is="a" href="https://api.aa1.cn" class="header-right-wrapper xiarou-ziyuansou"-->
                            <!--data-v-72b75d77="">-->
                            <!--    <a href="https://api.aa1.cn" rel="nofollow" target="_blank"-->
                            <!--    class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">-->
                            <!--        👀 免费API-->
                            <!--    </a>-->
                                <!---->
                            <!--</div>-->
                            <div is="a" href="<?php echo $url_loacl;?>"
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
                ishome="true" data-v-5cb43736="" data-v-c5c727d1="">
                    <div class="relative w-full flex justify-between h-[44px] mb-[14px] md:mb-0 xiarou-ziyuansou"
                    data-v-c5c727d1="">
                        <a href="../" class="truncate flex flex-row items-center justify-center xiarou-ziyuansou"
                        data-v-c5c727d1="">
                            <div class="h-6 xiarou-ziyuansou" data-v-c5c727d1="">
                                <img src="<?php echo $logo;?>" class="w-auto h-full object-contain xiarou-ziyuansou"
                                alt="<?php echo $title_left;?>">
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
                    <div class="yp-home-rank-category-style xiarou-ziyuansou" data-v-3ef596ee="">
                        <div class="w-full mb-1 relative md:-top-3 -top-[6px] xiarou-ziyuansou" data-v-3ef596ee=""
                        data-v-7aa9b9fc="">
                            <div class="w-full relative flex flex-row justify-between items-start text-center rounded-[10px] bg-notice-bg border-[1px] border-notice-border py-3 pl-4 pr-[22px] notice-shadow xiarou-ziyuansou"
                            data-v-7aa9b9fc="">
                                <div id="ring" class="cursor-pointer leading-4 xiarou-ziyuansou" data-v-7aa9b9fc="">
                                    🔔
                                </div>
                                <div class="px-5 transition-all leading-4 text-[14px] text-notice-text text-left xiarou-ziyuansou"
                                data-v-7aa9b9fc="">
                                    <?php echo $Notice;?>
                                </div>
                                <i class="yp-notice-close xiarou-ziyuansou" data-v-7aa9b9fc="">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" class="icon absolute xiarou-ziyuansou" data-v-7aa9b9fc=""
                                    style="" width="26px" height="26px" viewBox="0 0 24 24" data-v-bd832875="">
                                        <path class="xiarou-ziyuansou" fill="currentColor" d="m12 12.727l-3.592 3.592q-.16.16-.354.15T7.7 16.3t-.16-.364q0-.203.16-.363L11.273 12L7.681 8.433q-.16-.16-.15-.364t.169-.363t.364-.16q.203 0 .363.16L12 11.298l3.567-3.592q.16-.16.354-.16t.354.16q.166.165.166.366t-.166.36L12.702 12l3.592 3.592q.16.16.16.354t-.16.354q-.165.166-.366.166t-.36-.166z">
                                        </path>
                                    </svg>
                                </i>
                            </div>
                        </div>
                        
                        
                        <div class="yp-home-rank-category-hot xiarou-ziyuansou" data-v-3ef596ee="">
                            <div class="yp-home-rank-item yp-home-rank-item-full xiarou-ziyuansou" style=""
                            data-v-3ef596ee="" data-v-42a95a69="">
                                <div class="yp-home-rank-item-hot-bg xiarou-ziyuansou" data-v-42a95a69="">
                                    <svg class="hidden md:block xiarou-ziyuansou" width="1196" height="218" viewBox="0 0 1196 218"
                                    fill="none" xmlns="http://www.w3.org/2000/svg" data-v-42a95a69="">
                                        <path class="xiarou-ziyuansou" d="M1196 65.568C1196 52.3131 1185.25 41.568 1172 41.568H1111.99C1102.21 41.568 1092.96 37.0881 1086.89 29.4083L1073.26 12.1597C1067.19 4.47987 1057.94 0 1048.15 0H16C7.16345 0 0 7.16344 0 16V202C0 210.837 7.16345 218 16 218H1180C1188.84 218 1196 210.837 1196 202V65.568Z"
                                        fill="white" data-v-42a95a69="">
                                        </path>
                                    </svg>
                                    <svg class="md:hidden xiarou-ziyuansou" width="341" height="237" viewBox="0 0 341 237"
                                    fill="none" xmlns="http://www.w3.org/2000/svg" data-v-42a95a69="">
                                        <path class="xiarou-ziyuansou" d="M341 48.0644C341 39.2279 333.837 32.0644 325 32.0644H280.307C270.627 32.0644 261.468 27.6834 255.394 20.1478L248.758 11.9167C242.683 4.38109 233.524 0 223.845 0H7.00079C3.1348 0 0.000793457 3.13401 0.000793457 7V230C0.000793457 233.866 3.1348 237 7.00079 237H334C337.866 237 341 233.866 341 230V48.0644Z"
                                        fill="white" data-v-42a95a69="">
                                        </path>
                                    </svg>
                                </div>
                                <div class="yp-home-rank-item-content xiarou-ziyuansou" data-v-42a95a69="">
                                    <div class="item-content-header xiarou-ziyuansou" data-v-42a95a69="">
                                        <div class="item-content-header-title-common xiarou-ziyuansou" data-v-42a95a69="">
                                            <div class="item-content-header-title-img xiarou-ziyuansou" data-v-42a95a69="">
                                                <svg class="xiarou-ziyuansou" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" data-v-42a95a69="">
                                                    <path class="fill-current xiarou-ziyuansou" d="M12.6016 16H4.10157C2.75857 16 1.67188 15.0232 1.67188 13.8184V6.1816C1.67188 4.9768 2.75987 4 4.10026 4H12.6003C13.942 4 15.03 4.9768 15.03 6.1816V6.9328L16.8633 6.0052C17.0449 5.91252 17.2492 5.86379 17.457 5.8636C18.1279 5.8636 18.6719 6.352 18.6719 6.9544V13.042C18.6719 13.6444 18.1279 14.1328 17.457 14.1328C17.2487 14.1325 17.0439 14.0833 16.862 13.99L15.0286 13.0636V13.8184C15.0286 15.0232 13.9433 15.9988 12.6016 16ZM7.74349 7.708C7.58567 7.70657 7.42909 7.73369 7.28269 7.7878C7.13629 7.84191 7.00294 7.92195 6.89025 8.02335C6.77756 8.12475 6.68774 8.24553 6.62592 8.37879C6.5641 8.51205 6.53149 8.65518 6.52995 8.8V11.206C6.52995 11.8084 7.07264 12.2968 7.74349 12.2968C7.95144 12.2966 8.15584 12.2474 8.33718 12.154L10.7172 10.954C10.9047 10.8624 11.0616 10.7256 11.1708 10.5584C11.28 10.3912 11.3375 10.1998 11.337 10.0048C11.3377 9.80963 11.2803 9.61799 11.1711 9.45052C11.0619 9.28305 10.9049 9.14609 10.7172 9.0544L8.33718 7.8544C8.15602 7.76032 7.95165 7.71033 7.74349 7.7092V7.708Z"
                                                    fill="#1E2226">
                                                    </path>
                                                </svg>
                                            </div>
                                            全部
                                        </div>
                                        <div class="flex items-end flex-wrap pr-5 xiarou-ziyuansou" data-v-42a95a69="">
                                            <a target="_blank" href="<?php echo $url_local_2;?>" class="item-content-header-title-hot-rank xiarou-ziyuansou"
                                            data-v-42a95a69="">
                                                <!---->
                                                <i class="xiarou-ziyuansou" data-v-42a95a69="">
                                                    <svg width="76" height="17" viewBox="0 0 76 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="yp-rank-hot-sign-icon hidden md:block xiarou-ziyuansou" data-v-42a95a69="">
                                                        <path class="xiarou-ziyuansou" d="M5.2506 15.6996C4.3006 13.6996 4.8006 12.5496 5.5506 11.4996C6.3506 10.2996 6.5506 9.14961 6.5506 9.14961C6.5506 9.14961 7.20059 9.94961 6.95059 11.2496C8.05059 9.99961 8.2506 7.99961 8.1006 7.24961C10.6006 8.99961 11.7006 12.8496 10.2506 15.6496C17.9506 11.2496 12.1506 4.69961 11.1506 3.99961C11.5006 4.74961 11.5506 5.99961 10.8506 6.59961C9.7006 2.19961 6.85059 1.34961 6.85059 1.34961C7.20059 3.59961 5.6506 6.04961 4.1506 7.89961C4.1006 6.99961 4.05059 6.39961 3.55059 5.49961C3.45059 7.14961 2.2006 8.44961 1.8506 10.0996C1.4006 12.3496 2.2006 13.9496 5.2506 15.6996Z"
                                                        fill="white">
                                                        </path>
                                                        <path class="xiarou-ziyuansou" d="M32.435 2.625V8.73H32.945V10.755H30.26V4.65H28.955V5.985H29.81V8.01H28.955V10.785H26.78V8.01H25.955V5.985H26.78V4.65H25.895V2.625H26.78V1.485H28.955V2.625H32.435ZM25.46 6.285V8.31H24.26V10.74H22.085V8.31H20.9V6.285H22.085V4.71H20.9V2.685H22.085V1.5H24.26V2.685H25.46V4.71H24.26V6.285H25.46ZM23.375 14.7H21.2V11.235H23.375V14.7ZM26.495 14.7H24.32V11.235H26.495V14.7ZM29.63 14.7H27.455V11.235H29.63V14.7ZM32.75 14.7H30.575V11.235H32.75V14.7ZM35.0564 3.69V1.665H38.3714V3.69H35.0564ZM44.4464 14.7V3.69H39.0464V1.665H46.6214V14.7H44.4464ZM35.0564 14.7V4.38H37.2314V14.7H35.0564ZM59.6077 12.375L61.1527 12.96L60.5377 14.82L56.8177 13.395L53.2027 14.73L52.5577 12.9L54.0277 12.33L53.4727 12.12L54.0577 10.71H53.0377V8.835H55.8277V8.43H53.0977V2.43L55.3777 1.785L55.7827 3.585L54.8977 3.795V4.32H55.6327V5.985H54.8977V6.555H55.9627V1.455H57.9577V6.555H58.9777V5.985H58.3027V4.32H58.9777V3.885H58.2877V2.025H60.7477V8.43H58.0027V8.835H60.6127V12L59.6077 12.375ZM52.7827 9.21V11.235H51.9127V14.67H49.7377V11.235H48.6877V9.21H49.7377V5.67H48.7027V3.645H49.7377V1.5H51.9127V3.645H52.8127V5.67H51.9127V9.21H52.7827ZM58.1827 10.71H55.2127L56.7277 11.28L58.1827 10.71ZM74.0041 9.3V11.76H69.6991V14.67H67.5241V11.76H63.0991V10.185L66.5641 9.27H63.2491V7.665H65.5291L66.9841 6.39H65.0791V7.02H62.9041V4.545H67.5841V4.095H62.9791V2.22H67.5841V1.485H69.7591V2.22H74.3641V4.095H69.7591V4.545H74.4091V6.99H72.2341V6.39H68.2741L68.9791 7.065L68.0641 7.815H70.8541L73.4491 7.08L73.8391 8.565L68.2141 10.05H71.9191V9.3H74.0041ZM63.0391 14.685L62.6191 12.915L66.6091 11.955L67.0441 13.74L63.0391 14.685ZM70.1791 13.755L70.5841 11.97L74.6791 12.9L74.2741 14.67L70.1791 13.755Z"
                                                        fill="white">
                                                        </path>
                                                    </svg>
                                                    <svg width="89" height="19" viewBox="0 0 89 19" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="yp-rank-hot-sign-icon md:hidden xiarou-ziyuansou" data-v-42a95a69="">
                                                        <path class="xiarou-ziyuansou" d="M6.45473 16.35C5.44536 14.35 5.97661 13.2 6.77348 12.15C7.62348 10.95 7.83598 9.8 7.83598 9.8C7.83598 9.8 8.52661 10.6 8.26098 11.9C9.42973 10.65 9.64223 8.65 9.48286 7.9C12.1391 9.65 13.3079 13.5 11.7672 16.3C19.9485 11.9 13.786 5.35 12.7235 4.65C13.0954 5.4 13.1485 6.65 12.4047 7.25C11.1829 2.85 8.15473 2 8.15473 2C8.52661 4.25 6.87973 6.7 5.28598 8.55C5.23286 7.65 5.17973 7.05 4.64848 6.15C4.54223 7.8 3.21411 9.1 2.84223 10.75C2.36411 13 3.21411 14.6 6.45473 16.35Z"
                                                        fill="#FF5169">
                                                        </path>
                                                        <path class="xiarou-ziyuansou" d="M36.797 1.95V9.276H37.409V11.706H34.187V4.38H32.621V5.982H33.647V8.412H32.621V11.742H30.011V8.412H29.021V5.982H30.011V4.38H28.949V1.95H30.011V0.581999H32.621V1.95H36.797ZM28.427 6.342V8.772H26.987V11.688H24.377V8.772H22.955V6.342H24.377V4.452H22.955V2.022H24.377V0.6H26.987V2.022H28.427V4.452H26.987V6.342H28.427ZM25.925 16.44H23.315V12.282H25.925V16.44ZM29.669 16.44H27.059V12.282H29.669V16.44ZM33.431 16.44H30.821V12.282H33.431V16.44ZM37.175 16.44H34.565V12.282H37.175V16.44ZM39.9426 3.228V0.797999H43.9206V3.228H39.9426ZM51.2106 16.44V3.228H44.7306V0.797999H53.8206V16.44H51.2106ZM39.9426 16.44V4.056H42.5526V16.44H39.9426ZM69.4043 13.65L71.2583 14.352L70.5203 16.584L66.0563 14.874L61.7183 16.476L60.9443 14.28L62.7083 13.596L62.0423 13.344L62.7443 11.652H61.5203V9.402H64.8683V8.916H61.5923V1.716L64.3283 0.942L64.8143 3.102L63.7523 3.354V3.984H64.6343V5.982H63.7523V6.666H65.0303V0.545999H67.4243V6.666H68.6483V5.982H67.8383V3.984H68.6483V3.462H67.8203V1.23H70.7723V8.916H67.4783V9.402H70.6103V13.2L69.4043 13.65ZM61.2143 9.852V12.282H60.1703V16.404H57.5603V12.282H56.3003V9.852H57.5603V5.604H56.3183V3.174H57.5603V0.6H60.1703V3.174H61.2503V5.604H60.1703V9.852H61.2143ZM67.6943 11.652H64.1303L65.9483 12.336L67.6943 11.652ZM86.6799 9.96V12.912H81.5139V16.404H78.9039V12.912H73.5939V11.022L77.7519 9.924H73.7739V7.998H76.5099L78.2559 6.468H75.9699V7.224H73.3599V4.254H78.9759V3.714H73.4499V1.464H78.9759V0.581999H81.5859V1.464H87.1119V3.714H81.5859V4.254H87.1659V7.188H84.5559V6.468H79.8039L80.6499 7.278L79.5519 8.178H82.8999L86.0139 7.296L86.4819 9.078L79.7319 10.86H84.1779V9.96H86.6799ZM73.5219 16.422L73.0179 14.298L77.8059 13.146L78.3279 15.288L73.5219 16.422ZM82.0899 15.306L82.5759 13.164L87.4899 14.28L87.0039 16.404L82.0899 15.306Z"
                                                        fill="#1E2226">
                                                        </path>
                                                    </svg>
                                                </i>
                                            </a>
   <!--<p>随机推荐</p>-->
                                       
                                        </div>
                                        <a is="div" href="../" class="item-content-header-title-more xiarou-ziyuansou"
                                        data-v-42a95a69="">刷新资源<svg t="1736673123892" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="11676" width="16" height="16"><path d="M274.3 758.2l179.4 138.6c37.6 29 92.1 2.3 92.1-45.2v-38.4c161.1-1.1 291.6-136.3 291.6-303.7 0-36.5-6.1-68.9-16.2-101.3-40.5 117.5-147.8 202.5-275.4 202.5v-36.4c0-47.5-54.5-74.2-92.1-45.2L274.3 667.8c-29.6 22.8-29.6 67.5 0 90.4z" fill="#2867CE" p-id="11677"></path><path d="M753.7 268.2L574.3 129.6c-37.6-29-92.1-2.3-92.1 45.2v38.4c-161.1 1.1-291.6 136.3-291.6 303.7 0 36.5 6.1 68.9 16.2 101.3 40.5-117.5 147.8-202.5 275.4-202.5v36.4c0 47.5 54.5 74.2 92.1 45.2l179.4-138.7c29.6-22.8 29.6-67.5 0-90.4z" fill="#2867CE" p-id="11678"></path><path d="M483.3 462.8V164c-0.6 3.5-1 7-1 10.8v38.4c-161.1 1.1-291.6 136.3-291.6 303.7 0 36.5 6.1 68.9 16.2 101.3 40.5-117.5 147.8-202.5 275.4-202.5v36.4c0 3.7 0.3 7.3 1 10.7zM545.8 610.8v-36.4c0-3.7-0.4-7.3-1-10.8v298.9c0.6-3.5 1-7 1-10.8v-38.4c161.1-1.1 291.6-136.3 291.6-303.7 0-36.5-6.1-68.9-16.2-101.3-40.5 117.4-147.9 202.5-275.4 202.5z" fill="#BDD2EF" p-id="11679"></path></svg></a>
                                    </div>
                                  
                                        
                                            
  <ul class="item-content-body xiarou-ziyuansou result-container" data-v-42a95a69="">
</ul>
<div id="loading" style="display: none;">加载数据中，请耐心等待...</div>


                    
                                            
                                      
                                </div>
                            </div>
                        </div>
            
            
                  
                    
                    <div class="container">
                        
                        <!--最新资源-->
                        <div class="category">
                            <h2>
                                <span class="icon">
                                    <svg t="1736638552143" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5423" width="32" height="32"><path d="M875.6 724c0 128.5-162.8 160-363.6 160s-363.6-31.5-363.6-160S311.2 418.6 512 418.6 875.6 595.5 875.6 724z" fill="#C7F1FF" p-id="5424"></path><path d="M613 760.5H255.3c-20.8 0-37.6-16.9-37.6-37.6v-466c0-20.8 16.9-37.6 37.6-37.6H613c20.8 0 37.6 16.9 37.6 37.6v466c0.1 20.8-16.8 37.6-37.6 37.6z" fill="#FFD500" p-id="5425"></path><path d="M549.1 360.9H313.9c-11.8 0-21.4-9.6-21.4-21.4s9.6-21.4 21.4-21.4h235.2c11.8 0 21.4 9.6 21.4 21.4s-9.6 21.4-21.4 21.4zM495.6 467.8H313.9c-11.8 0-21.4-9.6-21.4-21.4s9.6-21.4 21.4-21.4h181.8c11.8 0 21.4 9.6 21.4 21.4s-9.7 21.4-21.5 21.4zM495.6 564.1H313.9c-11.8 0-21.4-9.6-21.4-21.4s9.6-21.4 21.4-21.4h181.8c11.8 0 21.4 9.6 21.4 21.4s-9.7 21.4-21.5 21.4zM495.6 660.3H313.9c-11.8 0-21.4-9.6-21.4-21.4s9.6-21.4 21.4-21.4h181.8c11.8 0 21.4 9.6 21.4 21.4s-9.7 21.4-21.5 21.4z" fill="#FFFFFF" p-id="5426"></path><path d="M755 844.7H402c-22.1 0-40-17.9-40-40V343.5c0-22.1 17.9-40 40-40h353c22.1 0 40 17.9 40 40v461.3c0 22-17.9 39.9-40 39.9z" fill="#00B1FF" p-id="5427"></path><path d="M531.4 762.6h-26.2c-5.9 0-10.7-4.7-10.9-10.5l-1.9-57.2c-0.4-0.1-0.7-0.2-1.1-0.2-3.1 11.1-6.2 22.2-9.4 33.3-2.8 9.9-5.8 19.7-8.3 29.7-1 4-2.7 5.6-7 5.5-9.3-0.3-18.5-0.1-28.8-0.1 0.6-2.9 1-5.2 1.6-7.4 12.2-44.4 24.6-88.8 36.7-133.2 2.5-9.2 10.9-15.3 20.5-15.3h8.3c5.8-0.1 10.6 4.5 11 10.3l3.3 57.8c0.3 0.1 0.5 0.2 0.8 0.2 1.1-3.4 2.2-6.7 3.2-10.1 4.8-17.2 9.6-34.4 14.1-51.7 1.2-4.8 3.1-7 8.4-6.7 4.5 0.2 9.1 0.2 13.8 0.2 7.2 0 12.5 6.8 10.6 13.8-2.6 9.6-5.1 18.8-7.8 28-0.4 1.4-2.7 2.6-4.4 3.3-13.1 5.3-21.9 14.6-25.8 28.2-4.8 16.9-9.4 33.9-13.5 51-2.9 11.9-1 22.5 11.3 28.7 0.5 0.1 0.6 1 1.5 2.4zM608.6 758.4l11.8-82.5c0.8-5.4 5.4-9.4 10.8-9.4h2.1c6.7 0 11.8 6 10.8 12.6l-6.2 38.6c0.3 0.1 0.7 0.2 1 0.3 5.6-14.3 11.6-28.5 16.7-42.9 2.5-6.9 5.7-10.6 13.6-9.3 4.3 0.7 8.7 0.1 13.6 0.1-2.9 17.5-5.6 34.4-8.4 51.2 0.2 0.1 0.5 0.1 0.7 0.2 5.7-14.3 11.8-28.4 16.9-43 2.5-7 6.1-9.6 13.3-8.6 4.5 0.6 9.2 0.1 14.8 0.1-0.9 2.7-1.4 4.7-2.1 6.6-10.6 26.7-21.4 53.5-31.9 80.2-1.5 3.9-3.4 5.8-7.9 5.5-4.2-0.2-8.4-0.2-12.7-0.2-6.7 0-11.8-5.9-10.9-12.4l4.1-28.1c-0.5-0.2-1-0.3-1.5-0.5-3 7.1-6.9 14-8.7 21.4-4 16.6-13.5 23.2-30.2 19.8-2.8-0.2-5.8 0.3-9.7 0.3z" fill="#FFFFFF" p-id="5428"></path><path d="M608.9 702.3c-0.9 5.2-5.5 9.1-10.8 9.1-8.8 0-17.2 0.1-25.5-0.1-4.5-0.1-6.6 1.2-7.5 5.7-1.4 7.2-3.7 14.2-5 21.4-0.4 2 1.1 4.3 1.8 6.4 2.4-1.2 6.1-1.8 7-3.7 1.5-3.2 2.7-6.6 3.8-10.1 2.3-7.5 9.4-12.4 17.2-12.4h0.3c7.5 0 12.8 7.4 10.3 14.4-3.9 11-10.9 19.6-19.7 24.8-23.6 14-52.3-8.5-46-35.3 3.7-15.8 8-31.5 13.9-46.6 7-17.8 35.4-25.3 52.7-16.7 7.7 3.9 12.3 10 11.3 18.7-1 8.3-2.4 16.3-3.8 24.4z m-37.6-8.1c7.1 2.2 10.7 0.6 11.1-6.4 0.1-2.4 1.4-4.8 1.3-7.1 0-2.1-1.1-4.2-1.8-6.3-2.1 1.5-5.3 2.6-6.2 4.6-1.9 4.6-2.9 9.7-4.4 15.2z" fill="#FFFFFF" p-id="5429"></path><path d="M698.8 414.4H463.6c-11.8 0-21.4-9.6-21.4-21.4s9.6-21.4 21.4-21.4h235.2c11.8 0 21.4 9.6 21.4 21.4s-9.6 21.4-21.4 21.4z" fill="#0091F1" p-id="5430"></path><path d="M645.3 521.3H463.6c-11.8 0-21.4-9.6-21.4-21.4 0-11.8 9.6-21.4 21.4-21.4h181.8c11.8 0 21.4 9.6 21.4 21.4-0.1 11.8-9.7 21.4-21.5 21.4z" fill="#0091F1" p-id="5431"></path></svg>
                                    最新资源</span>
                                <a href="../zuixin">更多</a>
                            </h2>
                            <ul class="item-content-body xiarou-ziyuansou result-container-zuixin" data-v-42a95a69=""></ul><div id="loading_zuixin" style="display: none;">加载数据中，请耐心等待...</div></div>
                        
                        <!--热门搜索-->
                        <div class="category">
                            <h2>
                                <span class="icon">
                                    <svg t="1736638316247" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4239" width="32" height="32"><path d="M261.808 757.901s194.841 263.084 444.027 38.086C977.58 550.335 479.188 383.015 479.188 383.015l-133.3 141.319-84.08 233.567z m0 0" fill="#FDB350" p-id="4240"></path><path d="M381.1 856.521c-46.161-99.683-21.533-156.993 14.007-210.753 38.617-59.105 48.889-117.479 48.889-117.479s30.414 41.309 18.109 105.725c53.668-62.292 63.921-161.974 55.737-200.06 121.673 88.622 173.638 280.515 103.563 422.567 372.581-219.322 92.633-548.268 43.763-585.292 16.388 37.023 19.464 99.7-13.679 130.315-55.389-219.688-192.79-264.53-192.79-264.53 16.406 113.213-58.813 237.101-131.267 329.313-2.38-45.19-5.127-76.171-28.033-119.604-5.109 81.884-65.295 148.79-81.701 231.04-21.863 111.438 16.406 192.956 163.402 278.758z m0 0" fill="#F23921" p-id="4241"></path></svg>
                                    热门搜索</span>
                                <a href="../new">更多</a>
                            </h2>
                            <ul class="item-content-body xiarou-ziyuansou result-container-remen" data-v-42a95a69=""></ul><div id="loading_remen" style="display: none;">加载数据中，请耐心等待...</div></div>

<!--下载榜单-->
                        <div class="category">
                            <h2>
                                <span class="icon">
                                    <svg t="1736638701362" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7465" width="32" height="32"><path d="M669.184 470.016h-92.672v23.04h81.408l-110.592 110.08 75.776 75.776 115.712-116.224v-11.776h-69.632z" fill="#FFCB99" p-id="7466"></path><path d="M402.432 493.056h11.776V423.424c0-11.264 4.096-21.504 10.752-29.696l32.256-38.912c6.144-7.68 15.872-12.8 26.624-12.8h249.344c-1.536-2.048-2.56-4.608-4.608-6.144L696.32 296.96c-6.656-7.68-16.384-12.8-27.136-12.8H390.656c-10.752 0-20.48 5.12-26.624 12.8l-32.256 38.912c-6.656 8.192-10.752 18.432-10.752 29.696V655.36c0 25.6 20.992 46.592 46.592 46.592h46.592V504.832l-11.776-11.776zM389.632 307.2h278.528l21.504 23.04H370.688l18.944-23.04z" fill="#FFCB99" p-id="7467"></path><path d="M463.36 388.608h275.456v-23.04H482.304z" fill="#FFCB99" p-id="7468"></path><path d="M821.248 393.728l-32.256-38.912c-6.656-7.68-16.384-12.8-27.136-12.8H483.84c-10.752 0-20.48 5.12-26.624 12.8L424.96 393.728c-6.656 8.192-10.752 18.432-10.752 29.696V713.728c0 25.6 20.992 46.592 46.592 46.592h325.12c25.6 0 46.592-20.992 46.592-46.592V423.424c-0.512-11.264-4.608-21.504-11.264-29.696z m-82.432 168.96l-116.224 116.224-75.264-75.264-52.224-52.224h81.408V470.016h92.672v81.408H750.592l-11.776 11.264z m0-174.08H463.36l18.944-23.04h278.528l21.504 23.04h-43.52z" fill="#FF7E00" p-id="7469"></path><path d="M327.68 816.128c-20.48 0-30.72-16.384-38.4-28.672-7.68-12.288-11.264-17.408-18.432-17.408-6.656 0-10.752 5.12-18.432 17.408-7.168 12.288-17.408 28.672-38.4 28.672-20.48 0-30.72-16.384-38.4-28.672-7.68-12.288-11.264-17.408-18.432-17.408-6.656 0-11.776-5.12-11.776-11.776s5.12-11.776 11.776-11.776c20.48 0 30.72 16.384 38.4 28.672 7.68 12.288 11.264 17.408 18.432 17.408 6.656 0 10.752-5.12 18.432-17.408 7.168-12.288 17.408-28.672 38.4-28.672 20.48 0 30.72 16.384 38.4 28.672 7.68 12.288 11.264 17.408 18.432 17.408s10.752-5.632 18.432-17.408c7.168-12.288 17.408-28.672 38.4-28.672 6.656 0 11.776 5.12 11.776 11.776s-5.12 11.776-11.776 11.776c-7.168 0-10.752 5.12-18.432 17.408-7.168 11.776-17.408 28.672-38.4 28.672z" fill="#FFC879" p-id="7470"></path><path d="M185.856 541.184h65.536v65.536H185.856zM910.336 382.976l34.816-35.328H875.52z" fill="#FFF7EC" p-id="7471"></path><path d="M920.064 781.312m-32.768 0a32.768 32.768 0 1 0 65.536 0 32.768 32.768 0 1 0-65.536 0Z" fill="#FFF7EC" p-id="7472"></path><path d="M890.88 226.816l-49.664-49.664c-3.584-3.584-9.216-3.584-12.8 0l-49.664 49.664c-3.584 3.584-3.584 9.216 0 12.8l49.664 49.664c3.584 3.584 9.216 3.584 12.8 0l49.664-49.664c3.584-3.584 3.584-9.216 0-12.8z m-56.32 43.008l-36.864-36.864 36.864-36.864 36.864 36.864-36.864 36.864zM229.888 319.488c-30.72 0-56.32 25.088-56.32 56.32s25.088 56.32 56.32 56.32 56.32-25.088 56.32-56.32-25.6-56.32-56.32-56.32z m0 88.576c-17.92 0-32.768-14.848-32.768-32.768s14.848-32.768 32.768-32.768c17.92 0 32.768 14.848 32.768 32.768s-14.848 32.768-32.768 32.768z" fill="#FFC879" p-id="7473"></path></svg>
                                    下载榜单</span>
                                <a href="../download_new">更多</a>
                            </h2>
                            <ul class="item-content-body xiarou-ziyuansou result-container-downloadtop" data-v-42a95a69=""></ul><div id="loading_downloadtop" style="display: none;">加载数据中，请耐心等待...</div></div>                        
                        
                        </div>
    
                        </div>
                    
                    
        
                        
                        
                    </div>
                    <!---->
                    <!--]-->
                </div>
                <!---->
                <?php include('footer.php');?>
            </div>

        </div>

        <div>
            <div>
                <div class="Vue-Toastification__container top-left">
                </div>
            </div>
            <div>
                <div class="Vue-Toastification__container top-center">
                </div>
            </div>
            <div>
                <div class="Vue-Toastification__container top-right">
                </div>
            </div>
            <div>
                <div class="Vue-Toastification__container bottom-left">
                </div>
            </div>
            <div>
                <div class="Vue-Toastification__container bottom-center">
                </div>
            </div>
            <div>
                <div class="Vue-Toastification__container bottom-right">
                </div>
            </div>
        </div>
        

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fetchData = async () => {
        const apiUrl = '<?php echo $dataurl_api;?>/api/data_api/index_rand_api/';
        const resultContainer = document.querySelector('.result-container');
        resultContainer.innerHTML = ''; // 清空内容

        // 显示加载动画
        const loading = document.getElementById('loading');
        loading.style.display = 'block';

        try {
            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error('网络响应错误');
            }
            const data = await response.json();

            // 隐藏加载动画
            loading.style.display = 'none';

            if (data.status === 'success') {
                data.data.forEach((item, index) => {
                    const listItem = `
                        <li class="item-content-body-list-item xiarou-ziyuansou" data-v-42a95a69="">
                            <a target="_blank" class="item-content-body-list-item-link xiarou-ziyuansou"
                               title="${item.post_title}" href="../d/${item.id}"
                               data-v-42a95a69="">
                                <div class="yp-rank-index yp-rank-index-first-three item-content-body-list-item-index xiarou-ziyuansou"
                                     index="${index + 1}" data-v-42a95a69="" data-v-5fa7af37="">
                                    <div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">
                                        ${index + 1}
                                    </div>
                                </div>
                                <div class="item-content-body-list-item-title xiarou-ziyuansou" data-v-42a95a69="">
                                    ${item.post_title}
                                </div>
                                <i class="xiarou-ziyuansou" data-v-42a95a69="">
                                    <svg class="xiarou-ziyuansou" width="16" height="17" viewBox="0 0 16 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" data-v-42a95a69="">
                                        <rect class="xiarou-ziyuansou" x="1" y="1.5" width="14" height="14" rx="2" fill="url(#paint0_linear_113_34696)">
                                        </rect>
                                        <path class="xiarou-ziyuansou" d="M12.068 12.4H10.889L10.25 10.447H11.384L12.068 12.4ZM9.971 12.4H8.81L8.261 10.447H9.386L9.971 12.4ZM7.91 12.4H6.749L6.272 10.447H7.397L7.91 12.4ZM5.138 12.4H3.977L4.607 10.447H5.714L5.138 12.4ZM9.404 5.146H10.646C11.123 5.146 11.375 5.398 11.375 5.866V6.874C11.375 7.765 11.384 8.548 11.42 8.854C11.447 9.034 11.519 9.151 11.744 9.151C11.888 9.151 12.023 9.124 12.167 9.088L11.987 10.06C11.825 10.096 11.663 10.123 11.501 10.123C10.862 10.123 10.547 9.781 10.448 9.25C10.376 8.818 10.349 7.999 10.349 6.874V6.181C10.349 6.073 10.322 6.046 10.214 6.046H9.404C9.395 6.523 9.332 7 9.206 7.459C9.485 7.576 9.764 7.702 10.043 7.837V8.881C9.647 8.683 9.26 8.503 8.873 8.341C8.513 9.043 7.964 9.682 7.145 10.24L6.803 9.25C7.289 8.89 7.658 8.458 7.901 7.972C7.73 7.909 7.55 7.855 7.379 7.801V6.811C7.667 6.892 7.946 6.982 8.234 7.081C8.315 6.748 8.351 6.397 8.36 6.046H7.532L7.424 5.146H8.36V4.318H9.404V5.146ZM6.101 7.855V9.097C6.101 9.691 5.75 10.069 5.129 10.114C4.868 10.132 4.607 10.114 4.346 10.051L4.103 9.151C4.328 9.214 4.544 9.232 4.769 9.214C4.931 9.205 5.075 9.088 5.075 8.917V7.999L3.959 8.152L3.851 7.252L5.075 7.09V6.046H4.094L3.986 5.146H5.075V4.318H6.101V5.146H7.064V6.046H6.101V6.964L7.064 6.838V7.72L6.101 7.855Z"
                                        fill="white">
                                        </path>
                                    </svg>
                                </i>
                            </a>
                        </li>
                    `;
                    resultContainer.insertAdjacentHTML('beforeend', listItem);
                });
            } else {
                resultContainer.innerHTML = `<p>错误：${data.message}</p>`;
            }
        } catch (error) {
            loading.style.display = 'none'; // 隐藏加载动画
            resultContainer.innerHTML = `<p>发生错误：${error.message}</p>`;
        }
    };

    // 调用函数
    fetchData();
});
</script>


        <script>
            
            document.addEventListener('DOMContentLoaded', function () {
                const fetchData = async () => {
                    const apiUrl = '<?php echo $dataurl_api;?>/api/data_api/index_zuixin_api/';
                    const resultContainer = document.querySelector('.result-container-zuixin');
                    resultContainer.innerHTML = ''; // 清空内容
            
                    // 显示加载动画
                    const loading = document.getElementById('loading_zuixin');
                    loading.style.display = 'block';
            
                    try {
                        const response = await fetch(apiUrl);
                        if (!response.ok) {
                            throw new Error('网络响应错误');
                        }
                        const data = await response.json();
                        // 隐藏加载动画
                        loading.style.display = 'none';
            
                        if (data.status === 'success') {
                            data.data.forEach((item, index) => {
                                const listItem = `<a href="../d/${item.id}" target="_blank"><li><div class="yp-rank-index yp-rank-index-first-three item-content-body-list-item-index xiarou-ziyuansou" index="1" data-v-42a95a69="" data-v-5fa7af37=""><div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">${index + 1}</div></div><div class="item-content-body-list-item-title xiarou-ziyuansou" data-v-42a95a69="" style="color: #333;font-weight: bold; " data-v-42a95a69>${item.post_title}</div></li></a>`;
                                resultContainer.insertAdjacentHTML('beforeend', listItem);
                            });
                        } else {
                            resultContainer.innerHTML = `<p>错误：${data.message}</p>`;
                        }
                    } catch (error) {
                        loading.style.display = 'none'; // 隐藏加载动画
                        resultContainer.innerHTML = `<p>发生错误：${error.message}</p>`;
                    }
                };
            
                // 调用函数
                fetchData();
            });


document.addEventListener('DOMContentLoaded', function () {
                const fetchData = async () => {
                    const apiUrl = '<?php echo $dataurl_api;?>/api/data_api/index_remen_api/';
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
            
                        if (data.status === 'success') {
                            data.data.forEach((item, index) => {
                                const listItem = `<a href="../d/${item.id}" target="_blank"><li><div class="yp-rank-index yp-rank-index-first-three item-content-body-list-item-index xiarou-ziyuansou" index="1" data-v-42a95a69="" data-v-5fa7af37=""><div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">${index + 1}</div></div><div class="item-content-body-list-item-title xiarou-ziyuansou" data-v-42a95a69="" style="color: #333;font-weight: bold; " data-v-42a95a69>${item.post_title}</div></li></a>`;
                                resultContainer.insertAdjacentHTML('beforeend', listItem);
                            });
                        } else {
                            resultContainer.innerHTML = `<p>错误：${data.message}</p>`;
                        }
                    } catch (error) {
                        loading.style.display = 'none'; // 隐藏加载动画
                        resultContainer.innerHTML = `<p>发生错误：${error.message}</p>`;
                    }
                };
            
                // 调用函数
                fetchData();
            });

document.addEventListener('DOMContentLoaded', function () {
                const fetchData = async () => {
                    const apiUrl = '<?php echo $dataurl_api;?>/api/data_api/index_download_top_api/';
                    const resultContainer = document.querySelector('.result-container-downloadtop');
                    resultContainer.innerHTML = ''; // 清空内容
            
                    // 显示加载动画
                    const loading = document.getElementById('loading_downloadtop');
                    loading.style.display = 'block';
            
                    try {
                        const response = await fetch(apiUrl);
                        if (!response.ok) {
                            throw new Error('网络响应错误');
                        }
                        const data = await response.json();
                        // 隐藏加载动画
                        loading.style.display = 'none';
            
                        if (data.status === 'success') {
                            data.data.forEach((item, index) => {
                                const listItem = `<a href="../d/${item.id}" target="_blank"><li><div class="yp-rank-index yp-rank-index-first-three item-content-body-list-item-index xiarou-ziyuansou" index="1" data-v-42a95a69="" data-v-5fa7af37=""><div class="yp-rank-index-basic xiarou-ziyuansou" data-v-5fa7af37="">${index + 1}</div></div><div class="item-content-body-list-item-title xiarou-ziyuansou" data-v-42a95a69="" style="color: #333;font-weight: bold; " data-v-42a95a69>${item.post_title}</div></li></a>`;
                                resultContainer.insertAdjacentHTML('beforeend', listItem);
                            });
                        } else {
                            resultContainer.innerHTML = `<p>错误：${data.message}</p>`;
                        }
                    } catch (error) {
                        loading.style.display = 'none'; // 隐藏加载动画
                        resultContainer.innerHTML = `<p>发生错误：${error.message}</p>`;
                    }
                };
            
                // 调用函数
                fetchData();
            });

        </script>
    </body>


</html>