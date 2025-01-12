document.addEventListener('DOMContentLoaded', function () {
    const fetchData = async () => {
        const apiUrl = 'https://ym.aa1.cn/api/data_api/index_rand_api/';
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
