<template>
    <div class="index-container">
        <div class="banner">
            <div class="block">
                <el-carousel trigger="click" height="280px">
                    <el-carousel-item v-for="item in 2" :key="item" align="center">
                        <div class="introduce">
                            <p class="large-title">从高质量的视频中学习 Laravel 和 Web 开发</p>
                            <p class="small-title">最持久的教学理念</p>
                            <p class="type-select">
                                <el-button type="success"><i class="fa fa-thumbs-up"></i>开始学习</el-button>
                                <el-button type="success"><i class="fa fa-star"></i>加入我们</el-button>
                            </p>
                        </div>
                    </el-carousel-item>
                </el-carousel>
            </div>
        </div>
        <div class="content-container">
            <div class="card">
                <el-tabs type="border-card">
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-date"></i> 我的行程</span>
                        <div class="detail-card">
                            <el-row :gutter="20">
                                <el-col :span="6" v-for="(o, index) in 10" :key="o" style="margin-bottom:20px;">
                                    <el-card :body-style="{ padding: '0px' }">
                                        <img src="/images/focus_weixin.png" class="image" style="width: 100%;">
                                        <div style="padding: 14px;">
                                            <p>laravel基础教程（<strong>53</strong>课时）</p>
                                            <div class="bottom clearfix">
                                                <time class="time">2017-07-21</time>
                                                <el-button type="info"size="small" class="button" style="float: right;">免费观看</el-button>
                                            </div>
                                        </div>
                                    </el-card>
                                </el-col>
                            </el-row>
                        </div>
                    </el-tab-pane>
                    <el-tab-pane label="消息中心">消息中心</el-tab-pane>
                    <el-tab-pane label="角色管理">角色管理</el-tab-pane>
                    <el-tab-pane label="定时任务补偿">定时任务补偿</el-tab-pane>
                </el-tabs>
            </div>
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

        };
    }
}
</script>