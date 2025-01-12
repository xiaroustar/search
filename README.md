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

1. 创建数据库，将数据库配置信息配置到config.php
2. sql创建语句

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- 自增 ID
    ip_address VARCHAR(45) NOT NULL,        -- IP 地址
    post_id INT NOT NULL,               -- 资源ID
    created_at DATETIME NOT NULL,           -- 时间（y-m-d H:i:s）
    date_only DATE NOT NULL                 -- 时间（y-m-d）
);

3. 启动网站即可

