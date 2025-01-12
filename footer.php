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


<footer class="yp-footer yp-footer-home flex-none xiarou-ziyuansou" data-v-5cb43736=""
data-v-e5eb44a8="">
    <div class="yp-footer-friend-ship-link xiarou-ziyuansou" data-v-e5eb44a8=""
    data-v-1aeec498="">
        <div class="yp-footer-friend-ship-link-basic xiarou-ziyuansou" data-v-1aeec498="">
            <div class="xiarou-ziyuansou" data-v-1aeec498="">
                友情链接：
            </div>
            <!--[-->
            <a href="https://api.aa1.cn/" title="免费API" target="_blank"
            class="link-item xiarou-ziyuansou" data-v-1aeec498="">
                免费API
            </a>
            
            <a href="https://ym.aa1.cn/" title="资源搜-免费源码" target="_blank"
            class="link-item xiarou-ziyuansou" data-v-1aeec498="">
                资源搜-免费源码
            </a>
           
            
            
            
        </div>
        <a href="/sitemap.xml" target="_blank" class="yp-footer-friend-ship-link-more xiarou-ziyuansou"
            data-v-1aeec498="">
                网站地图
                
            </a>
            <a href="/disclaimer" target="_blank" class="yp-footer-friend-ship-link-more xiarou-ziyuansou"
            data-v-1aeec498="">
            法律声明
                
            </a>


    </div>
    <div class="yp-footer-statement xiarou-ziyuansou" data-v-e5eb44a8="">
        <div class="whitespace-pre-wrap xiarou-ziyuansou" data-v-e5eb44a8="">
            <?php echo $footer_Notice;?>
            
        </div>
    </div>
</footer>

<style>
  .btn-like {
	display: inline-block;
	padding: 3px 8px;
	/* 内边距 */
	font-size: 10px;
	/* 字体稍大一点 */
	font-weight: 500;
	text-align: center;
	border-radius: 4px;
	/* 矩形按钮的圆角 */
	cursor: pointer;
	border: 2px solid transparent;
	/* 默认透明边框 */
	transition: transform 0.2s ease, background-color 0.3s ease;
}
.btn-like.red {
	color: red;
	background-color: white;
	border-color: red;
	/* 红色边框 */
}
.btn-like.blue {
	color: blue;
	background-color: white;
	border-color: blue;
	/* 蓝色边框 */
}
.btn-like.green {
	color: green;
	background-color: white;
	border-color: green;
	/* 绿色边框 */
}
.btn-like:hover {
	background-color: rgba(0, 0, 0, 0.05);
	/* 悬浮时背景微变 */
	transform: scale(1.05);
	/* 鼠标悬浮时放大 */
}
.btn-like:active {
	transform: scale(0.95);
	/* 点击时缩小 */
}
</style>

<script>
    function changeCloudType(type) {
        // 获取当前页面的 URL
        var currentUrl = window.location.href;
        
        // 使用 URLSearchParams 处理查询参数
        var urlParams = new URLSearchParams(window.location.search);
    
        // 设置或更新 cloud_type 参数
        urlParams.set('cloud_type', type);
        
        // 生成新的 URL
        var newUrl = currentUrl.split('?')[0] + '?' + urlParams.toString();
        
        // 跳转到新的 URL
        window.location.href = newUrl;
    }

    window.onload = function() {
        var urlParams = new URLSearchParams(window.location.search);
        var cloudType = urlParams.get('cloud_type');
        
        var items = document.querySelectorAll('.yp-search-main-nav-item');
        
        if (!cloudType) {
            items.forEach(function(item) {
                item.classList.remove('yp-search-main-nav-item-active');
            });
        } else {
            items.forEach(function(item) {
                if (item.getAttribute('onclick').includes(cloudType)) {
                    item.classList.add('yp-search-main-nav-item-active');
                } else {
                    item.classList.remove('yp-search-main-nav-item-active');
                }
            });
        }
    };
</script>
<script>
    const searchInput = document.getElementById('resource-search-input');
    const searchIcon = document.querySelector('svg');
    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            search();
        }
    });
    searchIcon.addEventListener('click', search);
    function search() {
        const query = searchInput.value.trim();
        if (query) {
            window.location.href = `../search/?search=${encodeURIComponent(query)}`;
        }
    }
</script>

<script>
// 点击事件绑定
document.getElementById("download_data").addEventListener("click", function () {
    loading_download();
    
    // 弹窗显示
    document.getElementById("modaldiv").style.display = "block";
    loading_download_success();

});

// 关闭 Modal
document.getElementById("closedownload_button").addEventListener("click", function() {
    var modal = document.getElementById("modaldiv");
    modal.style.display = "none";
});


       
       
       document.getElementById('cloud_type_test').addEventListener('click', function() {
    // Get the post_id dynamically (replace this with actual post_id logic)
    var postId = "<?php echo $search_value; ?>"; // Ensure PHP can provide post_id

    // Show loading modal
    const loadingSwal = Swal.fire({
        title: '正在检测资源...',
        text: '请稍等片刻，正在进行资源有效性检测。',
        imageWidth: 50,
        imageHeight: 50,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Send the post_id to the PHP script
    var formData = new FormData();
    formData.append('post_id', postId);

    fetch('<?php echo $dataurl_api;?>/api/data_api/d_data_cloud_type_test/index.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Close loading modal
        loadingSwal.close();

        // Check if the status is 'success' or 'error' and show corresponding message
        if (data.status === 'success') {
            // Show success message with resource status
            Swal.fire({
                title: data.result === '正常' ? '资源正常' : '资源失效',
                text: data.result === '正常' ? '可前往下载资源' : '资源失效，请及时反馈！',
                icon: data.result === '正常' ? 'success' : 'error',  // Use 'success' for normal and 'error' for failure
                confirmButtonText: 'OK',
                background: '#f3f4f6',
                color: '#333',
                confirmButtonColor: '#ff6e6e'
            });
        } else {
            // Show failure message with error information
            Swal.fire({
                title: '资源检测失败',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'OK',
                background: '#f3f4f6',
                color: '#333',
                confirmButtonColor: '#ff6e6e'
            });
        }
    })
    .catch(error => {
        // Close loading modal
        loadingSwal.close();
        console.error('Error:', error);
        Swal.fire({
            title: '检测失败',
            text: '无法连接到服务器，请稍后再试。',
            icon: 'error',
            confirmButtonText: 'OK',
            background: '#f3f4f6',
            color: '#333',
            confirmButtonColor: '#ff6e6e'
        });
    });
});



     document.addEventListener("DOMContentLoaded", function() {
    const loadingElement = document.getElementById('loading_test');
    if (!loadingElement) {
        console.error('Loading element not found');
        return;
    }

    // 显示加载动画
    loadingElement.style.display = 'block';

    // 获取页面上的 id 参数
    const urlParams = new URLSearchParams(window.location.search);
    const postId = '<?php echo $search_value;?>';
    
    // 确保 post_id 存在并且是有效的数字
    if (!postId || isNaN(postId)) {
        console.error('Invalid post_id');
        return;
    }

    // 请求数据
    fetch(`<?php echo $dataurl_api;?>/api/data_api/d_data_teststatus/?post_id=${postId}`)
        .then(response => response.json())
        .then(data => {
            // 隐藏加载动画
            loadingElement.style.display = 'none';
            
            if (data.status === 'success' && data.data) {
                const testData = data.data;
                
                // 获取目标容器
                const container = document.getElementById('d_statustest');
                if (!container) {
                    console.error('Target container not found');
                    return;
                }

                // 遍历返回的数据并根据 result 输出不同的样式
                testData.forEach(item => {
                    const resultElement = document.createElement('span');
                    resultElement.classList.add('download_url');
                    
                    // 设置样式
                    resultElement.style.backgroundColor = item.result === '正常' ? '#0065ff' : '#ff0000';
                    resultElement.style.borderColor = item.result === '正常' ? '#0065ff' : '#ff0008';
                    
                    // 合并 check_date 和 result
                    resultElement.innerHTML = `${item.check_date} ｜ ${item.result}`;
                
                    // 将结果插入到目标容器中
                    container.appendChild(resultElement);
                });

            } else {
                console.error('Failed to fetch data:', data.message);
            }
        })
        .catch(error => {
            // 隐藏加载动画并显示错误信息
            loadingElement.style.display = 'none';
            console.error('Error:', error);
        });
});


document.addEventListener("DOMContentLoaded", function() {
    loading_data();
    const loadingElement = document.getElementById('loading');
    if (!loadingElement) {
        console.error('Loading element not found');
        return;
    }

    // 显示加载动画
    loadingElement.style.display = 'block';

    // 获取页面上的 id 参数
    const urlParams = new URLSearchParams(window.location.search);
    const id = '<?php echo $search_value;?>';  // 获取 URL 中的 id 参数
    
    // 确保 id 存在并且是有效的数字
    if (!id || isNaN(id)) {
        console.error('Invalid ID');
        return;
    }

    // 请求数据
    fetch(`<?php echo $dataurl_api;?>/api/data_api/d_data_api/?id=${id}`)
        .then(response => response.json())
        .then(data => {
            // 隐藏加载动画
            loadingElement.style.display = 'none';
            
            if (data.status === 'success' && data.data) {
                
                loading_data_success();
                const post = data.data;
                
                // 更新页面内容
                document.title = post.post_title + `<?php echo $title?>`;  // 设置网页标题，包含默认值和动态标题

                document.getElementById('post-title').innerHTML = post.post_title || '资源已下架，看看别的吧';
                document.getElementById('title').innerHTML = post.post_title || '资源已下架，看看别的吧';
                document.getElementById('post-title-alert').innerHTML = post.post_title || '资源已下架，看看别的吧';
                document.getElementById('post-content').innerHTML = post.post_content || '资源已下架，看看别的吧';
                document.getElementById('post-guid').innerHTML = post.guid || '未知';
                document.getElementById('post-date').innerHTML = post.post_date || '未知';
                // document.getElementById('cloud-type').innerHTML = post.cloud_type || 'No cloud type available';
                document.getElementById('view').innerHTML = post.view || '未知';
                document.getElementById('download-view').innerHTML = post.download_view || '未知';

                // 根据 cloud_type 更新 cloud-type-value 和 cloud-type-value-img
                let cloudTypeValue = '';
                let cloudTypeImg = '../assets/jiazai-3.svg';
                
                switch (post.cloud_type) {
                    case 'baidu':
                        cloudTypeValue = '百度云';
                        cloudTypeImg = '../assets/baidu.svg';
                        break;
                    case 'lanzou':
                        cloudTypeValue = '蓝奏云';
                        cloudTypeImg = '../assets/lanzou.svg';
                        break;
                    case 'alipan':
                        cloudTypeValue = '阿里云盘';
                        cloudTypeImg = '../assets/alipan.ico';
                        break;
                    case 'xunlei':
                        cloudTypeValue = '迅雷';
                        cloudTypeImg = '../assets/xunlei.svg';
                        break;
                    case 'other_type':
                        cloudTypeValue = '其他';
                        cloudTypeImg = '../assets/other.svg';
                        break;
                    case 'quark':
                        cloudTypeValue = '夸克';
                        cloudTypeImg = '../assets/quark.ico';
                        break;
                    case '123pan':
                        cloudTypeValue = '123盘';
                        cloudTypeImg = '../assets/yunpan123.svg';
                        break;
                    default:
                        cloudTypeValue = '未知';
                        cloudTypeImg = '../assets/other.svg';
                        break;
                }

               
                // 设置云盘类型和值
                document.getElementById('cloud-type-value').innerHTML = cloudTypeValue;
                document.getElementById('cloud-type-value_t').innerHTML = cloudTypeValue;
                document.getElementById('cloud-type-value_s').innerHTML = cloudTypeValue;
                document.getElementById('cloud-type-value_r').innerHTML = cloudTypeValue;
                document.getElementById('cloud-type-value_alert').innerHTML = cloudTypeValue;
                document.getElementById('cloud-type-value-img').src = cloudTypeImg;  // 设置img的src
                document.getElementById('cloud-type-value-img_alert').src = cloudTypeImg;  // 设置img的src

            } else {
                loading_data_error();
                console.error(data.message);
            }
        })
        .catch(error => {
            loading_data_error();
            // 隐藏加载动画并显示错误信息
            loadingElement.style.display = 'none';
            console.error('Error:', error);
        });
});

</script>



<script>

// 关闭 Modal
document.getElementById("closedownload_button").addEventListener("click", function() {
    var modal = document.getElementById("modaldiv");
    modal.style.display = "none";
});

</script>
        <style>
                    .download_url {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    text-decoration: none;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.download_url:hover {
    color: #fff;
    background-color: #0056b3;
    border-color: #004085;
    text-decoration: none;
}

.download_url:focus {
    color: #fff;
    background-color: #0056b3;
    border-color: #004085;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}

.download_url:active {
    color: #fff;
    background-color: #004085;
    border-color: #002752;
    text-decoration: none;
}

                </style>