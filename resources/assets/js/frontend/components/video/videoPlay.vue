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
                
            </div>
            <div class="video-comment">
                <h2 class="title">视频评论</h2>
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
    </div>
</template>