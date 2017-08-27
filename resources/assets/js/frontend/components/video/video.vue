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
                <el-col :span="6" v-for="(o, index) in 10" :key="o" style="margin-bottom:20px;">
                    <el-card :body-style="{ padding: '0px' }">
                        <img src="/images/focus_weixin.png" class="image" style="width: 100%;">
                        <div style="padding: 14px;">
                            <p>laravel基础教程（<strong>53</strong>课时）</p>
                            <div class="bottom clearfix">
                                <time class="time">2017-07-21</time>
                                <el-button type="info" size="small" class="button" style="float: right;">免费观看</el-button>
                            </div>
                        </div>
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