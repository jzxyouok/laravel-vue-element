<template>
    <div class="content-container leave-container">
        <el-row :gutter="10">
            <el-col :xs="24" :sm="24" :md="16" :lg="16">
                <div class="breadcrumb">
                    <el-breadcrumb separator="/">
                        <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                        <el-breadcrumb-item>技术篇</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="content-box leave-box">
                    <div class="interactive-now">
                        <quill-edit class="interactive-now-content" v-model="leave.content" :options="editorOption"></quill-edit>
                        <div class="interactive-now-submit">
                            <el-button type="primary" @click="leaveSubmit">提　交</el-button>
                        </div>
                    </div>
                    <div class="interactive-box leavel-list">
                        <h2 class="sidebar-title">视频评论 （<span>56</span>条）</h2>
                        <div class="interactive-list">
                            <div class="interactive-detail">
                                <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                                <div class="interactive-word">
                                    <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                                    <p class="interactive-content">运用laravel+vue+elementui，从零搭建一个技术博客！</p>
                                </div>
                                <div class="interactive-response">
                                    <div class="interactive-detail">
                                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                                        <div class="interactive-word">
                                            <p class="user-name">高山流水 #<span>amgogo先生</span><span>2017-07-12 16:12:31</span></p>
                                            <p class="interactive-content">老哥，稳！</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="interactive-response">
                                    <div class="interactive-detail">
                                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                                        <div class="interactive-word">
                                            <p class="user-name">amgogo先生 #<span>高山流水</span><span>2017-07-12 16:12:31</span></p>
                                            <p class="interactive-content">本人从事php开发工作，一直奋战在一线，处于水深火热之中，工作之余看看知乎、逛逛github、打打游戏！</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="interactive-response">
                                    <div class="interactive-detail">
                                        <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                                        <div class="interactive-word">
                                            <p class="user-name">高山流水 #<span>amgogo先生</span><span>2017-07-12 16:12:31</span></p>
                                            <p class="interactive-content">老哥，稳！</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="interactive-detail">
                                <div class="user-face"><a href="javascript:;"><img src="/images/focus_weixin.png" /></a></div>
                                <div class="interactive-word">
                                    <p class="user-name">高山流水<span>2017-07-12 16:12:31</span></p>
                                    <p class="interactive-content">老哥，稳！</p>
                                </div>
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
<script type="text/javascript">
import { quillEditor } from 'vue-quill-editor';
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
        },
        'quill-edit': quillEditor
    },
    data() {
        return {
            currentPage1: 5,
            leave: {
                content: ''
            },
            editorOption: {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        [{ 'script': 'sub' }, { 'script': 'super' }],
                        [{ 'indent': '-1' }, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        //[{ 'size': ['small', false, 'large', 'huge'] }],
                        //[{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'color': [] }, { 'background': [] }],
                        //[{ 'font': [] }],
                        //[{ 'align': [] }],
                        ['clean'],
                        ['link']
                        //['link', 'image', 'video']
                    ]
                }
            }
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
        },
        leaveSubmit() {

        }
    }
}
</script>