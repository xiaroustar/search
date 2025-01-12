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
<?php include('config.php');?>

<html class="theme-day" lang="zh-CN"><head class="xiarou-ziyuansou">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta class="xiarou-ziyuansou" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title class="xiarou-ziyuansou">
            隐私声明-<?php echo $title;?>
        </title>
        <meta class="xiarou-ziyuansou" name="renderer" content="webkit">
        <link class="xiarou-ziyuansou" rel="icon" type="image/x-icon" href="<?php echo $logo;?>">

        <meta class="xiarou-ziyuansou" name="keywords" content="<?php echo $keywords;?>">
        <meta class="xiarou-ziyuansou" name="description" content="<?php echo $description;?>">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/entry.BMP3qFZ0.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/index.YjTv_RHj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/SpIndex.DBgkGSBF.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/PageCom.CSpJ1xGU.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Icon.Dan13sfw.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/website.D_-tiCWj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FireSvg.DYove8g3.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Loading.Bn6jPpTJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Pagination.DtFhuOin.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Notice.O1KhRlGv.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/CategoryNav.CsxyjWPd.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Table.72xskwfL.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/MobileNav.CSGbzlMj.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/default.B5z-pQNO.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/FooterStyle2.D4Mv1PiJ.css">
        <link class="xiarou-ziyuansou" rel="stylesheet" href="../assets/Pendant.y4AbnFSO.css">

        <input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7"><script type="text/javascript" src="chrome-extension://dbjbempljhcmhlfpfacalomonjpalpko/scripts/inspector.js"></script></head><body class="bg-primary-bg"><input type="hidden" id="_o_dbjbempljhcmhlfpfacalomonjpalpko" data-inspect-config="7">
       
        <style type="text/css">
            .medium-zoom-overlay{position:fixed;top:0;right:0;bottom:0;left:0;opacity:0;transition:opacity
            .3s;will-change:opacity}.medium-zoom--opened .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}.medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform
            .3s cubic-bezier(.2,0,.2,1)!important}.medium-zoom-image--hidden{visibility:hidden}.medium-zoom-image--opened{position:relative;cursor:pointer;cursor:zoom-out;will-change:transform}
        </style>
    
    
    
        <div class="xiarou-ziyuansou" id="__nuxt">
            <!--[-->
            <div class="yp-search-header xiarou-ziyuansou" style="" data-v-5cb43736="">
                <div id="search-result-header" class="yp-header-default xiarou-ziyuansou" data-v-5cb43736="" data-v-bdb05f16="">
                    <a href="../" class="yp-header-logo xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="h-[33px] xiarou-ziyuansou" data-v-bdb05f16="">
                            <img src="<?php echo $logo;?>" class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                        </div>
                        <div class="ml-[10px] app-name text-[22px] leading-[31px] xiarou-ziyuansou" data-v-bdb05f16="">
                            <?php echo $title_left;?>
                        </div>
                    </a>
                    <div class="yp-header-search-home yp-header-search xiarou-ziyuansou" data-v-bdb05f16="">
                        <div class="yp-header-search-basic xiarou-ziyuansou" style="margin: 0px 400px;" data-v-bdb05f16="">
                            <i class="flex-[114] xiarou-ziyuansou" data-v-bdb05f16="">
                            </i>
                            <div id="resource-search-container" class="yp-search undefined yp-search-header yp-header-search-input xiarou-ziyuansou" data-v-bdb05f16="" data-v-d86bfa86="">
                                <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text" value="" placeholder="  请输入搜索关键词，建议2-5字" data-v-d86bfa86="">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="icon items-center cursor-pointer flex-shrink-0 m-0 md:mr-2 text-secondary xiarou-ziyuansou" data-v-d86bfa86="" style="" width="20px" height="20px" viewBox="0 0 24 24" data-v-bd832875="">
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
                            
                            <div is="a" href="<?php echo $url_local;?>" class="header-right-wrapper xiarou-ziyuansou" data-v-72b75d77="">
                                <a href="<?php echo $url_local;?>" rel="nofollow" target="_blank" class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
                                    <?php echo $url_local_title;?>
                                </a>
                                <!---->
                            </div>
                            <div is="a" href="<?php echo $url_local_2;?>" class="header-right-wrapper xiarou-ziyuansou" data-v-72b75d77="">
                                <a href="<?php echo $url_local_2;?>" rel="nofollow" target="_blank" class="header-right-item xiarou-ziyuansou" data-v-72b75d77="">
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
                <div id="search-result-header-mobile" class="sticky top-0 py-2 z-[1000] bg-primary-bg flex flex-col items-center w-full px-4 md:hidden flex-none xiarou-ziyuansou" ishome="true" data-v-5cb43736="" data-v-c5c727d1="">
                    <div class="relative w-full flex justify-between h-[44px] mb-[14px] md:mb-0 xiarou-ziyuansou" data-v-c5c727d1="">
                        <a href="../" class="truncate flex flex-row items-center justify-center xiarou-ziyuansou" data-v-c5c727d1="">
                            <div class="h-6 xiarou-ziyuansou" data-v-c5c727d1="">
                                <img src="<?php echo $logo;?>" class="w-auto h-full object-contain xiarou-ziyuansou" alt="<?php echo $title_left;?>">
                            </div>
                            <h1 class="ml-[7px] app-name truncate text-[20px] leading-7 font-bold xiarou-ziyuansou" data-v-c5c727d1="">
                                <?php echo $title_left;?>
                            </h1>
                        </a>

                    </div>
                   
                    
                    <div id="resource-search-container" class="yp-search yp-search-header xiarou-ziyuansou" data-v-c5c727d1="" data-v-d86bfa86="">
    <form action="../search/" method="get" style="display: flex; align-items: center; width: 100%;">
        <input id="resource-search-input" class="yp-search-input xiarou-ziyuansou" type="text" name="search" value="" placeholder="  输入完直接回车" style="flex-grow: 1; border: none; padding: 0.5rem; font-size: 1rem;">
        <button type="submit" style="display: none;">搜索</button>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="icon items-center cursor-pointer flex-shrink-0 m-0 md:mr-2 text-secondary xiarou-ziyuansou" data-v-d86bfa86="" style="cursor: pointer;" width="20px" height="20px" viewBox="0 0 24 24" data-v-bd832875="">
            <path class="xiarou-ziyuansou" fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39M11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7"></path>
        </svg>
    </form>
</div>

                </div>
                <div id="wrap" class="max-w-[1264px] w-full flex flex-col items-center mx-auto flex-grow px-4 md:px-8 yp-duanjusoubacom" data-v-5cb43736=""><!--[--><article class="w-full w-max-[100%] items-center justify-center flex flex-col yp-disclaimer yp-duanjusoubacom" data-v-eeb89472=""><!--[--><!--]--><div id="sp-intro-container" class="customize-class prose prose-slat yp-duanjusoubacom"><h1>免责声明</h1>
<blockquote>
<p>提示：在使用本站服务之前，请您务必认真阅读并遵守《免责声明》（以下简称“本协议”）和《隐私条款》。请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款、争议解决和法律适用条款。免除或者限制责任的条款可能将以加粗字体显示，您应重点阅读。</p>
</blockquote>
<p>当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，或您以其他允许的方式实际使用本服务时，即表示您已充分阅读、理解并接受本协议的全部内容，本协议即产生法律约束力。您承诺接受并遵守本协议的约定，届时您不应以未阅读本协议的内容或者未获得本站对您问询的解答等理由，主张本协议无效或要求撤销本协议。</p>
<p>如果您因年龄、智力等因素而不具有完全民事行为能力，请在法定监护人（以下简称“监护人”）的陪同下阅读和判断是否同意本协议。</p>
<p>1、本站支持每一个公民在宪法的规定下行使公民言论自由的权利，本站所有言论仅代表网友个人观点。但并不表示我们支持这些言论所代表的观点。不对网友发表的任何攻击性，或侮辱性的信息负法律责任。如果你发现他人发表带有任何攻击性，或侮辱他人的任何信息，请及时告知管理员或版主。我们会在第一时间作出审核与相应的处理。</p>
<p>2、 所有网友不得盗用有明确版权要求的文字、图片、音频、视频等作品，转贴请注明来源，否则问责自负。本站所收集资源均来自网盘用户公开分享，不做任何盈利，仅作个人公益学习，请勿非法&amp;商业传播，如有侵权，请联系网盘源分享用户删除。如果您认为本站含有侵犯了您合法权益的内容，请及时与我们联系，我们会在第一时间调查并做相应的删除处理。本站尊重他人之任何合法权利(包括知识产权)，同时也要求我们的使用者也尊重他人之合法权利。本站保留本网站原创版权，任何涉嫌侵犯本站版权的行为，本站保留追究其法律责任的权利。</p>
<p>3、 当政府机关依照法定程序要求本站披露个人资料时，本站将根据执法单位之要求或为公共安全之目的来配合、提供个人资料。在此情况下之任何披露，本站均得免责。</p>
<p>4、 由于您将用户密码告知他人或与他人共享注册帐户或与他人共享计算机，由此导致的任何个人资料泄露，本站概不负责，亦不承担任何法律责任。</p>
<p>5、 任何由于计算机问题、黑客攻击、计算机病毒侵入或发作、因政府管制而造成的暂时性关闭等影响网络正常运行之不可抗力而造成的个人资料泄露、丢失、被盗或被篡改等，本站概不负责，亦不承担任何法律责任。</p>
<p>6、 由于与本站链接的其它网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，本站不承担任何责任。在向这些与本站链接的网站提供个人信息之前，请查阅它们的隐私条款。</p>
<p>7、 本站注明之服务条款外，其它因使用本站而导致的任何意外、疏忽、合约毁坏、诽谤、版权或知识产权侵犯及其所造成的各种损失（包括因下载而感染电脑病毒），本站概不负责，亦不承担任何法律责任。</p>
<p>8、 任何从没经过本站官方注明而从相关的网页及其链接所得到的资讯、产品及服务而遭受损失的，本站概不负责，亦不负任何法律责任。</p>
<p>9、本站为完全免费分享资源社区，所有资源问题，本站没责任，更没义务提供任何性质的技术支持，需要技术支持的请购买官方商业版！</p>
<p>10、在本站的网页上有时候可能会出现有为浏览者提供方便的第三方链接(包括链接引用)或广告出现，链接或广告内容并不代表本站观点，若点击即可能将离开本站进入第三方站点，而本站将不为第三方站点带来的任何风险负责。</p>
<p>11、 本站认为，所有网民在进入本站首页及其他各层页面时已经仔细看过本条款并完全同意。</p>
<p>12、 法律上有相关解释的，以中国法律之解释为基准。本网站使用者因为违反本声明的规定而触犯中华人民共和国法律的，一切后果自己负责，本网站不承担任何责任。</p>
<p>本站不储存任何资源，所有资源均来自用户分享的网盘链接。
本站为非盈利性站点，不会收取任何费用，所有内容不作为商业行为。</p>
</div>
<?php include 'footer.php';?>
</article><!--]--></div>
                <!---->



        </div>


    


</body></html>