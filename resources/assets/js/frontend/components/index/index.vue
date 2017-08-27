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
    </div>
</template>
<script type="text/javascript">
export default {

}
</script>