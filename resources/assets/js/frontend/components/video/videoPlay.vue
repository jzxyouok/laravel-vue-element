<template>
    <div class="content-container video-play-container">
        <div class="breadcrumb">
            <el-breadcrumb separator="/">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item :to="{ path: '/video/detail' }">视频列表</el-breadcrumb-item>
                <el-breadcrumb-item>在线观看：1.Yii基础视频讲解</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <div class="content-box video-play-box">
            <div class="video-play">
                <div class="video-tip">
                    <p>Quickzz编程，《Yii课程实战》，正在学习：<strong>4</strong>课时 / <strong>19</strong>课时
                        <router-link to="/">免费观看</router-link>
                    </p>
                </div>
                <div class="video-show">
                    <video id="my-video" class="video-js vjs-big-play-centered" playsinline controls preload="auto" poster="/images/focus_weixin.png" data-setup="{}" style="min-height: 500px;">
                        <source src="/videos/test.mp4" type='video/mp4'>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                        </p>
                    </video>
                </div>
            </div>
            <div class="video-intro">
                <div class="video-describe">
                    <p>Font Awesome为您提供可缩放的矢量图标，您可以使用CSS所提供的所有特性对它们进行更改，包括：大小、颜色、阴影或者其它任何支持的效果。每周推送 Laravel 最新资讯、精华文章、开发技巧、推荐扩展包、最新 Laravel 职位信息以及 「Laravel China 社区」上的精华讨论。每周推送 Laravel 最新资讯、精华文章、开发技巧、推荐扩展包、最新 Laravel 职位信息以及 「Laravel China 社区」上的精华讨论。每周推送 Laravel 最新资讯、精华文章、开发技巧、推荐扩展包、最新 Laravel 职位信息以及 「Laravel China 社区」上的精华讨论。</p>
                </div>
                <div class="video-page">
                    <h2 class="sidebar-title">视频选择 （<span>34</span>课时）</h2>
                    <ul class="video-menu">
                        <li><a href="javascript:;">1.yii安装</a></li>
                        <li><a href="javascript:;">2.yii基础配置</a></li>
                        <li><a href="javascript:;">3.yii视频页面</a></li>
                        <li><a href="javascript:;">4.变量初始化、传递</a></li>
                        <li><a href="javascript:;">1.yii安装</a></li>
                        <li><a href="javascript:;">2.yii基础配置</a></li>
                        <li><a href="javascript:;">3.yii视频页面</a></li>
                        <li><a href="javascript:;" class="active">4.变量初始化、传递</a></li>
                        <li><a href="javascript:;">1.yii安装</a></li>
                        <li><a href="javascript:;">2.yii基础配置</a></li>
                        <li><a href="javascript:;">3.yii视频页面</a></li>
                        <li><a href="javascript:;">4.变量初始化、传递</a></li>
                        <li><a href="javascript:;">1.yii安装</a></li>
                        <li><a href="javascript:;">2.yii基础配置</a></li>
                        <li><a href="javascript:;">3.yii视频页面</a></li>
                        <li><a href="javascript:;">4.变量初始化、传递</a></li>
                        <li><a href="javascript:;">1.yii安装</a></li>
                        <li><a href="javascript:;">2.yii基础配置</a></li>
                        <li><a href="javascript:;">3.yii视频页面</a></li>
                        <li><a href="javascript:;">4.变量初始化、传递</a></li>
                    </ul>
                </div>
            </div>
            <div class="video-comment">
                <h2 class="sidebar-title">视频评论</h2>
                <div class="comment-list">
                    <div class="comment-detail">
                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                        <div class="comment-word">
                            <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                            <p class="comment-content">老哥，稳！</p>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                        <div class="comment-word">
                            <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                            <p class="comment-content">老哥，稳！</p>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                        <div class="comment-word">
                            <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                            <p class="comment-content">老哥，稳！</p>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                        <div class="comment-word">
                            <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                            <p class="comment-content">老哥，稳！</p>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                        <div class="comment-word">
                            <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                            <p class="comment-content">老哥，稳！</p>
                        </div>
                    </div>
                </div>
                <div class="comment-now">
                    我要评论
                </div>
            </div>
        </div>
        <remote-css href="http://vjs.zencdn.net/5.19.2/video-js.css"></remote-css>
        <remote-js src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></remote-js>
        <remote-js src="http://vjs.zencdn.net/5.19.2/video.js"></remote-js>
    </div>
</template>
<script type="text/javascript">
export default {
    components: {
        'remote-js': {
            render(createElement) {
                return createElement('script', { attrs: { type: 'text/javascript', src: this.src } });
            },
            props: {
                src: { type: String, required: true },
            },
        },
        'remote-css': {
            render(createElement) {
                return createElement('link', { attrs: { type: 'text/css', rel: 'stylesheet', href: this.href } });
            },
            props: {
                href: { type: String, required: true },
            },
        }
    },
    data() {
        return {
            currentPage1: 5,
        };
    },
    mounted() {},
    methods: {
        handleSizeChange(val) {
            console.log(`每页 ${val} 条`);
        },
        handleCurrentChange(val) {
            console.log(`当前页: ${val}`);
        }
    }
}
</script>