<template>
    <div class="container">
        <div class="web-header">
            <el-row :gutter="10" style="margin: 0;">
                <el-col :xs="6" :sm="5" :md="4" :lg="4">
                    <div class="web-logo">
                        <router-link to="/">quickzz博客</router-link>
                    </div>
                </el-col>
                <el-col :xs="18" :sm="19" :md="20" :lg="20">
                    <el-col :xs="0" :sm="11" :md="11" :lg="10">
                        <div class="web-search">
                            <el-input placeholder="请输入内容" v-model="searchContent">
                                <el-select v-model="searchSelect" slot="prepend" placeholder="请选择">
                                    <el-option label="餐厅名" value="1"></el-option>
                                    <el-option label="订单号" value="2"></el-option>
                                    <el-option label="用户电话" value="3"></el-option>
                                </el-select>
                                <el-button slot="append" icon="search"></el-button>
                            </el-input>
                        </div>
                    </el-col>
                    <el-col :xs="24" :sm="13" :md="13" :lg="14">
                        <div class="web-menu">
                            <el-menu theme="dark" :default-active="$store.state.menuActive" class="el-menu-demo" mode="horizontal" @select="menuSelect">
                                <router-link to="/">
                                    <el-menu-item index="1">首页</el-menu-item>
                                </router-link>
                                <router-link to="/video/index">
                                    <el-menu-item index="2">视频列表</el-menu-item>
                                </router-link>
                                <el-submenu index="3">
                                    <template slot="title">文章列表</template>
                                    <el-menu-item index="3-1">前端技术</el-menu-item>
                                    <el-menu-item index="3-2">后端技术</el-menu-item>
                                    <el-menu-item index="3-3">服务器</el-menu-item>
                                    <el-menu-item index="3-4">其它类别</el-menu-item>
                                </el-submenu>
                                <el-menu-item index="4">
                                    <router-link to="/leave">投票</router-link>
                                </el-menu-item>
                                <el-menu-item index="5">
                                    <router-link to="/leave">留言板</router-link>
                                </el-menu-item>
                                <el-menu-item index="6">
                                    <router-link to="/signin">登录</router-link>
                                    /
                                    <router-link to="/signup">注册</router-link>
                                </el-menu-item>
                                <el-menu-item index="7"></el-menu-item>
                            </el-menu>
                        </div>
                    </el-col>
                </el-col>
            </el-row>
        </div>
        <div class="app-main" style="clear: both;">
            <router-view></router-view>
        </div>
        <div class="web-footer">
            <div class="footer-container">
                <el-row :gutter="10" style="margin: 0;">
                    <el-col :xs="10" :sm="10" :md="10" :lg="10">
                        <div class="describe introduction">
                            <h4 class="title">网站介绍</h4>
                            <p>我们是 PHP 和 Laravel 开发者社区，致力于为 PHP 和 Laravel 开发者提供一个分享创造、结识伙伴、协同互助的平台。</p>
                            <p class="add-friends">
                                <a class='qq' href="javascript:;"><i class="fa fa-qq"></i></a>
                                <a class='weixin' href="javascript:;"><i class="fa fa-weixin"></i></a>
                                <a class='weibo' href="javascript:;"><i class="fa fa-weibo"></i></a>
                            </p>
                        </div>
                    </el-col>
                    <el-col :xs="8" :sm="8" :md="8" :lg="8">
                        <div class="describe statistical">
                            <h4 class="title">网站统计</h4>
                            <div class="all-statistical">
                                <ul>
                                    <li><a href="javascript:;">视频总数：<span>113</span> 个</a></li>
                                    <li><a href="javascript:;">文章总数：<span>98</span> 篇</a></li>
                                    <li><a href="javascript:;">访客总数：<span>31133</span> 个</a></li>
                                    <li><a href="javascript:;">会员总数：<span>3098</span> 个</a></li>
                                    <li><a href="javascript:;">点赞总数：<span>5013</span> 个</a></li>
                                    <li><a href="javascript:;">评论总数：<span>713</span> 个</a></li>
                                </ul>
                            </div>
                        </div>
                    </el-col>
                    <el-col :xs="6" :sm="6" :md="6" :lg="6">
                        <div class="describe share">
                            <h4 class="title">关注微信</h4>
                            <p class="share-weixin"><img src="/images/focus_weixin.png"></p>
                        </div>
                    </el-col>
                </el-row>
            </div>
        </div>
    </div>
</template>
<style type="text/scss" scope="scope">
    .el-select .el-input { width: 80px; }
</style>
<script type="text/javascript">
export default {
    data() {
        return {
            menuDefaultActive: '1',
            searchContent: '',
            searchSelect: '',
        };
    },
    methods: {
        menuSelect(key, keyPath) {

        }
    }
}
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
</style>