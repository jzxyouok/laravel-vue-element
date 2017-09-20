<template>
    <div class="content-container register-active-container">
        <div class="register-active-box">
            <div class="active-tip">
                <p>激活邮件已下发送至您的邮箱<a href="javascript:;">{{email}}</a>，请注意查收</p>
                <p>未收到？<a href="javascript:;">重新发送</a></p>
            </div>
            <div class="other-recommend">
                <h2 class="sidebar-title">其它推荐</h2>
                <el-row :gutter="10">
                    <el-col :xs="8" :sm="8" :md="8" :lg="8">
                        <div class="active-recommend article-recommend">
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
                    </el-col>
                    <el-col :xs="8" :sm="8" :md="8" :lg="8">
                        <div class="active-recommend video-recommend">
                            <h3>热门视频<a href="javascript:;">更多视频 ++</a></h3>
                            <ul>
                                <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                                <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                                <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                                <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                                <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            </ul>
                        </div>
                    </el-col>
                    <el-col :xs="8" :sm="8" :md="8" :lg="8">
                        <div class="active-recommend video-recommend">
                            <h3>热门留言<a href="javascript:;">更多留言 ++</a></h3>
                            <ul>
                                <li><a href="javascript:;">1.Laravel 5.4 中文文档</a></li>
                                <li><a href="javascript:;">2.一小时同步一次，更多信息请查阅 文档导读</a></li>
                                <li><a href="javascript:;">3.每周推送 Laravel 最新资讯</a></li>
                                <li><a href="javascript:;">4.每周推送 Laravel 最新资讯</a></li>
                                <li><a href="javascript:;">5.一小时同步一次，更多信息请查阅 文档导读</a></li>
                            </ul>
                        </div>
                    </el-col>
                </el-row>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    data() {
        return {
            id: this.$route.query.id,
            email: this.$route.query.email,
        };
    },
    mounted() {
        window._this = this;
    },
    methods: {

    }
}
</script>