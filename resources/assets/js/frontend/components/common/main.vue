<template>
    <div class="container">
        <div class="web-header">
            <el-row :gutter="10">
                <el-col :xs="6" :sm="5" :md="4" :lg="3">
                    <div class="web-logo">
                        <router-link to="/">quickzz博客</router-link>
                    </div>
                </el-col>
                <el-col :xs="18" :sm="19" :md="20" :lg="21">
                    <el-col :xs="0" :sm="11" :md="11" :lg="11">
                        <div class="web-search">
                            <el-input placeholder="请输入内容" v-model="searchContent">
                                <el-select v-model="select" slot="prepend" placeholder="请选择">
                                    <el-option label="餐厅名" value="1"></el-option>
                                    <el-option label="订单号" value="2"></el-option>
                                    <el-option label="用户电话" value="3"></el-option>
                                </el-select>
                                <el-button slot="append" icon="search"></el-button>
                            </el-input>
                        </div>
                    </el-col>
                    <el-col :xs="24" :sm="13" :md="13" :lg="13">
                        <div class="web-menu">
                            <el-menu theme="dark" :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                                <el-menu-item index="1">首页</el-menu-item>
                                <el-menu-item index="2">视频列表</el-menu-item>
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
            <router-view>123</router-view>
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
            activeIndex: '1',
            searchContent: '',
            select: '',
        };
    },
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        }
    }
}
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
</style>