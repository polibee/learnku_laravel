# LearnKu 社交网站

一个基于 Laravel 11 开发的社交网络平台，提供用户互动、微博发布、评论等功能。

## 功能特性

- 用户认证与授权
  - 用户注册
  - 用户登录
  - 记住密码
  - 密码重置
  - 邮箱验证
  - 管理员权限

- 用户管理
  - 个人资料更新
  - 头像上传
  - 用户列表
  - 用户删除（管理员）

- 微博功能
  - 发布微博
  - 微博列表
  - 个人微博中心
  - 微博删除

- 社交互动
  - 关注用户
  - 取消关注
  - 粉丝列表
  - 关注列表
  - 微博评论

## 技术栈

- Laravel 10
- MySQL
- Tailwind CSS
- Alpine.js
- PHP 8.1+

## 安装步骤

1. 克隆代码库
```bash
git clone https://github.com/polibee/learnku_laravel/tree/master
```
2.安装依赖
```bash
composer install
npm install
```
3.配置环境
```bash
cp .env.example .env
php artisan key:generate
```
4.配置数据库
在 .env 文件中设置数据库连接信息
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learnku
DB_USERNAME=root
DB_PASSWORD=
```
5.运行迁移和填充数据
```bash
php artisan migrate --seed

```
6.创建存储链接
php artisan migrate --seed
7.编译前端资源
npm run dev
