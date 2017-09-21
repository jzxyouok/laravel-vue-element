<template>
    <div class="content-container article-container">
        <el-row :gutter="10">
            <el-col :xs="24" :sm="24" :md="16" :lg="16">
                <div class="breadcrumb">
                    <el-breadcrumb separator="/">
                        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                        <el-breadcrumb-item>技术篇</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="content-box article-box">
                    <div class="article-detail">
                        <div class='article-picture'><img src="/images/focus_weixin.png"></div>
                        <div class="article-word">
                            <h2 class='article-title'>
                                <router-link to="/article/detail/33dbcionlkh2g2j12vh2vgc21g3h2f1vhj3v" target="_blank">1.laravel的基础配置常出现的错误</router-link>
                            </h2>
                            <div class='article-right'>
                                <p>
                                    作者：<span>林联敏</span> 发表时间：
                                    <span>2017-07-18</span> 类别：
                                    <span>php后端</span>
                                </p>
                            </div>
                            <div class='article-intro'>
                                <p>目前可以通过 unpkg.com/element-ui 获取到最新版本的资源，在页面上引入 js 和 css 文件即可开始使用添加box-sizing:border-box，容器内子元素增加padding,border，容器宽度都不会被撑开。或者是在容器里边添加一个无用的div块标签，也是可以的...</p>
                            </div>
                            <div class='article-interactive'>
                                <p>
                                    <a href="javascript:;"><i class='fa fa-thumbs-o-up'></i><span>1</span></a>
                                    <a href="javascript:;"><i class='fa fa-commenting-o'></i><span>12</span></a>
                                    <a href="javascript:;"><i class='fa fa-eye'></i><span>3245</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="article-detail">
                        <div class='article-picture'><img src="/images/focus_weixin.png"></div>
                        <div class="article-word">
                            <h2 class='article-title'><a href="javascript:;">1.laravel的基础配置常出现的错误</a></h2>
                            <div class='article-right'>
                                <p>
                                    作者：<span>林联敏</span> 发表时间：
                                    <span>2017-07-18</span> 类别：
                                    <span>php后端</span>
                                </p>
                            </div>
                            <div class='article-intro'>
                                <p>目前可以通过 unpkg.com/element-ui 获取到最新版本的资源，在页面上引入 js 和 css 文件即可开始使用添加box-sizing:border-box，容器内子元素增加padding,border，容器宽度都不会被撑开。或者是在容器里边添加一个无用的div块标签，也是可以的...</p>
                            </div>
                            <div class='article-interactive'>
                                <p>
                                    <a href="javascript:;"><i class='fa fa-thumbs-o-up'></i><span>1</span></a>
                                    <a href="javascript:;"><i class='fa fa-commenting-o'></i><span>12</span></a>
                                    <a href="javascript:;"><i class='fa fa-eye'></i><span>3245</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="article-detail">
                        <div class='article-picture'><img src="/images/focus_weixin.png"></div>
                        <div class="article-word">
                            <h2 class='article-title'><a href="javascript:;">1.laravel的基础配置常出现的错误</a></h2>
                            <div class='article-right'>
                                <p>
                                    作者：<span>林联敏</span> 发表时间：
                                    <span>2017-07-18</span> 类别：
                                    <span>php后端</span>
                                </p>
                            </div>
                            <div class='article-intro'>
                                <p>目前可以通过 unpkg.com/element-ui 获取到最新版本的资源，在页面上引入 js 和 css 文件即可开始使用添加box-sizing:border-box，容器内子元素增加padding,border，容器宽度都不会被撑开。或者是在容器里边添加一个无用的div块标签，也是可以的...</p>
                            </div>
                            <div class='article-interactive'>
                                <p>
                                    <a href="javascript:;"><i class='fa fa-thumbs-o-up'></i><span>1</span></a>
                                    <a href="javascript:;"><i class='fa fa-commenting-o'></i><span>12</span></a>
                                    <a href="javascript:;"><i class='fa fa-eye'></i><span>3245</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="article-detail">
                        <div class='article-picture'><img src="/images/focus_weixin.png"></div>
                        <div class="article-word">
                            <h2 class='article-title'><a href="javascript:;">1.laravel的基础配置常出现的错误</a></h2>
                            <div class='article-right'>
                                <p>
                                    作者：<span>林联敏</span> 发表时间：
                                    <span>2017-07-18</span> 类别：
                                    <span>php后端</span>
                                </p>
                            </div>
                            <div class='article-intro'>
                                <p>目前可以通过 unpkg.com/element-ui 获取到最新版本的资源，在页面上引入 js 和 css 文件即可开始使用添加box-sizing:border-box，容器内子元素增加padding,border，容器宽度都不会被撑开。或者是在容器里边添加一个无用的div块标签，也是可以的...</p>
                            </div>
                            <div class='article-interactive'>
                                <p>
                                    <a href="javascript:;"><i class='fa fa-thumbs-o-up'></i> <span>1</span></a>
                                    <a href="javascript:;"><i class='fa fa-commenting-o'></i> <span>12</span></a>
                                    <a href="javascript:;"><i class='fa fa-eye'></i> <span>3245</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="page-box">
                        <el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page.sync="currentPage1" :page-size="100" layout="total, prev, pager, next" :total="1000">
                        </el-pagination>
                    </div>
                </div>
            </el-col>
            <el-col :xs="0" :sm="0" :md="8" :lg="8">
                <div class='right-recommend'>
                    <div class="recommend-box hot-article">
                        <h3>热门文章<a href="javascript:;">更多推荐 ++</a></h3>
                        <ul>
                            <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                            <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">6.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">7.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">8.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">9.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">10.每周推送 Laravel 最新资讯</a></li>
                        </ul>
                    </div>
                    <div class="recommend-box hot-video">
                        <h3>热门视频<a href="javascript:;">更多视频 ++</a></h3>
                        <ul>
                            <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                            <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                        </ul>
                    </div>
                    <div class="recommend-box hot-comment">
                        <h3>精彩评论<a href="javascript:;">更多评论 ++</a></h3>
                        <ul>
                            <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                            <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                        </ul>
                    </div>
                    <div class="recommend-box hot-leave">
                        <h3>精彩留言<a href="javascript:;">更多留言 ++</a></h3>
                        <ul>
                            <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                            <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                        </ul>
                    </div>
                    <div class="recommend-box hot-vote">
                        <h3>当前投票<a href="javascript:;">更多投票 ++</a></h3>
                        <ul>
                            <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                            <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                            <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                        </ul>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
</template>
<style rel="stylesheet/scss" lang="scss" scoped>
.article-container {
    .article-box {
        padding-right: 20px;
        margin-right: 10px;
        border-right: 1px solid #eee;
        .article-detail {
            padding: 5px 8px;
            border: 1px solid #eee;
            box-shadow: 3px 5px 3px #fafafa;
            border-radius: 3px;
            float: left;
            margin-bottom: 20px;
            .article-picture {
                width: 20%;
                float: left;
                img {
                    width: 100%;
                    border-radius: 3px;
                }
            }
            .article-word {
                float: left;
                width: 80%;
                box-sizing: border-box;
                padding-left: 5px;
                .article-title {
                    margin-bottom: 5px;
                    a {
                        font-size: 16px;
                        color: #333;
                    }
                    a:hover {
                        color: red;
                        text-decoration: underline;
                    }
                }
                .article-right {
                    margin-bottom: 5px;
                    font-size: 12px;
                }
                .article-intro {
                    text-indent: 20px;
                    font-size: #666;
                    line-height: 180%;
                    margin-bottom: 5px;
                }
                .article-interactive {
                    text-align: right;
                    a {
                        color: #999;
                        font-size: 13px;
                        margin-right: 10px;
                    }
                }
            }
        }
    }
}
</style>
<script type="text/javascript">
export default {
    data() {
        return {
            currentPage1: 5,
        };
    },
    mounted() {

    },
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