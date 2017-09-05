## 前言 ##
- 本人从事php开发工作，一直奋战在一线，处于水深火热之中，工作之余看看知乎、逛逛github、打打游戏，某一日，顿悟，萌生出好好学习的想法，因此，拿起键盘就是一顿敲，开始了这个项目。本项目搭建纯属个人兴趣和学习所用（非大神），如有侵权、代码不合理，结构混乱等问题，勿喷，烦请第一时间通知我：QQ：**292304400**，gmail邮箱地址：**linlm1994@gmail.com**，本人将立即删除或修改（穷苦百姓，赔不起，如有侵权绝非有意），望海涵，谢谢！（2017-08-20）

## 预期主要功能 ##
- 注册、登录、注销、记住密码、改密、冻结
- 文章发布、置顶、推荐、修改、删除、评论、回复、点赞、阅读记录、分享朋友圈空间等
- 视频发布、置顶、添加活动、促销、购买、上架下架、删除、编辑、在线观看、收藏、限时免费观看
- Markdown编辑器、echarts图表、excel导入导出
- 日志管理
- 权限控制
- 七牛云存储、redis缓存、视频抢购并发
- 公共错误401、404页面
- QQ、微信登录
- 邮件发送，redis队列
- 前台响应式布局
- 数据库一键备份，还原
- 网站在线人数统计
- 留言板、投票管理、公告模块
- 网站维护关闭
- 整站搜索
- 后台推送通知，即时响应

## 技术栈 ##
- **laravel + vue2 + vuex + vue-router + webpack + ES6/7 + elementui + 七牛云存储 + redis + sass**

## 效果演示 ##
- 暂时为空（后期补上）

## 开发部署 ##
- php7.0 + mysql5.6
- nodejs下载地址：[http://nodejs.cn/download/](http://nodejs.cn/download/ "nodejs下载地址")
<pre>
    # 克隆项目
    git clone https://github.com/linlianmin/laravel-vue-element.git
    
    # laravel生成app_key
    php artisan key:generate  

    # 复制.env.example文件为.env，配置数据库参数
    php artisan migrate:refresh --seed

    # 安装依赖
    //环境首先必须安装nodejs，下载地址：（上面提供）

    //npm速度慢可考虑使用淘宝镜像，可能会出现诡异报错，npm install --registry=https://registry.npm.taobao.org
    npm install -g yarn   
    
    yarn install

    # 本地开发 开启服务
    yarn run dev
</pre>

## 代码结构 ##
<pre>
├── app
├── ├── http
├── ├── ├── Controllers        // 前后台控制器
├── ├── Models                 // 模型类
├── └── Repositories           // 逻辑层
├── database
├── ├── migrations             // 数据表生成
├── └── seeds                  // 数据填充
├── config                     // 配置相关
├── public
├── ├── css                    // webpack编译后的css文件
├── ├── fonts                  // 字体文件
├── ├── js                     // webpack编译后的js文件
├── ├── resources
├── ├── ├── assets
├── ├── ├── ├── js             // vue组件和app.js等
├── └── └── └── sass           // sass文件
├── .env.example               // 配置文件
├── webpack.mix.js             // webpack
├── .gitignore                 // git 忽略项
├── composer.json              // composer.json
└── package.json               // package.json
</pre>

## 项目部分页面截图 ##
- 暂时为空（后期补上）