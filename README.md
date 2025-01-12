# 免费源码资源搜索引擎

## 项目介绍

免费的源码资源搜索引擎，汇集了多家网盘的资源，提供丰富的源码下载链接。系统包含了网盘资源检测功能，能够实时检查网盘资源的有效性。同时，为了防止爬虫自动抓取资源，所有下载地址均采用AES256加密保护，确保资源安全。

### 主要功能

- **网盘资源搜索**：支持搜索多个网盘平台的资源，快速查找并提供下载链接。
- **资源有效性检测**：自动检测网盘资源的有效性，确保用户获得有效的下载链接。
- **AES256加密下载地址**：下载链接使用AES256加密算法保护，有效防止被爬虫抓取。
- **下载次数限制**：系统限制每个IP每日最多下载10次，防止滥用资源。
- **多网盘支持**：支持来自多个网盘平台的资源，提供丰富的选择。
- **演示网站**：可以访问 [演示网站](https://zy.aa1.cn) 进行在线体验。

## 技术栈

- **PHP 7.2**：后端采用PHP 7.2作为开发语言。
- **Nginx**：使用Nginx作为Web服务器，提供高效的请求处理。
- **MySQL 5.6**：使用MySQL 5.6作为数据库管理系统，存储资源信息和用户下载记录。
- **AES256加密**：下载地址通过AES256加密算法保护，增加安全性。

## 安装与部署

### 环境要求

- PHP 7.2 或更高版本
- Nginx 1.14 或更高版本
- MySQL 5.6 或更高版本
- OpenSSL（用于AES256加密）

### 安装步骤

1. 创建数据库，将数据库配置信息配置到 `config.php`
2. 执行以下 SQL 创建语句

```sql
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    post_id INT NOT NULL,
    created_at DATETIME NOT NULL,
    date_only DATE NOT NULL
);
```
3. 伪静态设置
   
```
location ~ ^/d/([0-9]+)$ {
    rewrite ^/d/([0-9]+)$ /d/index.php?data_id=$1 last;
}

location ~ ^/download$ {
    rewrite ^/download$ /download.php last;
}

location ~ ^/zuixin {
    rewrite ^/zuixin /index_data/zuixin.php last;
}

location ~ ^/remen {
    rewrite ^/remen /index_data/remen.php last;
}
location ~ ^/download_new {
    rewrite ^/download_new /index_data/download_new.php last;
}

location ~ ^/disclaimer {
    rewrite ^/disclaimer /disclaimer.php last;
}
```

4. 启动网站

如有疑问请联系夏柔QQ：15001904
项目仅供学习测试交流，请在24h小时内删除源文件
