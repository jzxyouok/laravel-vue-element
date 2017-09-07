<template>
    <div class="content-container video-container">
        <div class="breadcrumb">
            <el-breadcrumb separator="/">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item>视频列表</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <div class="video-box">
            <el-row :gutter="20">
                <el-col :span="6" v-for="(o, index) in 10" :key="o" class="video-detail">
                    <el-card :body-style="{ padding: '0px' }">
                        <router-link to="/video/detail">
                            <div class="video-thumb">
                                <img src="/images/focus_weixin.png" class="image video-image">
                                <div class="video-mask"><span><i class="fa fa-play"></i></span></div>
                            </div>
                            <div class="video-intro">
                                <h4>laravel基础教程（<strong>53</strong>课时）</h4>
                                <div class="bottom clearfix">
                                    <time class="time">2017-07-21</time>
                                    <el-button type="info" size="small" class="button">免费观看</el-button>
                                </div>
                            </div>
                        </router-link>
                    </el-card>
                </el-col>
            </el-row>
        </div>
    </div>
</template>
<style type="text/scss" scoped="scope">
    .el-row { margin-bottom: 20px; &:last-child { margin-bottom: 0; } }
</style>
<script type="text/javascript">
export default {
    data() {
        return {

        }
    },
    mounted() {
        this.$store.commit('changeMenuActive', '2');
    }
}
</script>