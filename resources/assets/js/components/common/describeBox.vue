<template>
    <div id="am-link-container" class="am-link-container" v-show="describeData.show" v-model="describeData">
        <el-card class="box-card">
            <span class="am-close" @click="describeData.show = !describeData.show"><i class="el-icon-close"></i></span>
            <span class="am-direction-icon"></span>
            <div class="text item">用户名： <span>{{describeData.username}}</span></div>
            <div class="text item">标签：
                <span>
                    <el-tag>标签一</el-tag>
                    <el-tag type="gray">标签二</el-tag>
                    <el-tag type="primary">标签三</el-tag>
                    <el-tag type="success">标签四</el-tag>
                    <el-tag type="warning">标签五</el-tag>
                </span>
            </div>
            <div class="text item">其它操作：
                <el-button type="primary" size="mini">发送邮件</el-button>
            </div>
        </el-card>
    </div>
</template>
<style type="text/scss" scoped="scope">
    .am-link-container { 
        padding: 10px;
        width: 400px;
        position: fixed;
        z-index: 9999;
    } 
    .item { 
        padding: 5px 0; 
    }
    .box-card {
        position: relative;
    }
    .am-close {
        position: absolute;
        right: 5px;
        top: 5px;
        color: #E5E9F2;
        font-size: 12px;
        cursor: pointer;
    }
    .el-card {
        overflow: visible;
    }
    .am-direction-icon {
        width:0;
        height:0;
        border-width:10px 10px 10px 0;
        border-style:solid;
        border-color:transparent #E5E9F2 transparent transparent;
        position: absolute;
        top: 50%;
        margin-top: -10px;
        left: -10px;
    }
</style>
<script type="text/javascript">
export default {
    data() {
        return {
            describeData: {
                'show': false,
                'id': '',
                'username': ''
            }
        }
    },
    
    methods: {
        getLinkDescribe() {
            this.$emit('getLinkDescribe');
        },
    },
}
</script>