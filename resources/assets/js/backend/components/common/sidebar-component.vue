<template>
    <el-row :gutter="20" style="margin: 0px; padding: 0px;">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
            <div class="hamburger-container"><i class="fa fa-navicon"></i></div>
            <el-menu-item index="1">处理中心</el-menu-item>
            <el-submenu index="2">
                <template slot="title">我的工作台</template>
                <el-menu-item index="2-1">选项1</el-menu-item>
                <el-menu-item index="2-2">选项2</el-menu-item>
                <el-menu-item index="2-3">选项3</el-menu-item>
            </el-submenu>
            <el-menu-item index="3"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
            <el-submenu index="5" style="float: right;margin-right: 5px;">
                <template slot="title">{{adminData.username}}</template>
                <el-menu-item index="5-1">个人中心</el-menu-item>
                <el-menu-item index="5-2">设置</el-menu-item>
                <el-menu-item index="5-3" @click="logout">退出</el-menu-item>
            </el-submenu>
            <div class="permission-text">{{adminData.permission_text}}</div>
        </el-menu>
    </el-row>
</template>
<script>
export default {
    name: 'Sidebar',
    data() {
        return {

            activeIndex: '1',
            activeIndex2: '1',
            adminData: {
                username: '',
                permissionText: ''
            }
        };
    },
    mounted() {
        let _this = this;
        var adminData = sessionStorage.getItem('admin');
        if (adminData) {
            _this.adminData = JSON.parse(adminData);
        }
    },
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        },
        logout() {
            let _this = this;
            axios.post('/backend/logout').then(function(res) {
                let { status, message } = res.data;
                if (!status) {
                    _this.$message.error('未知错误，管理员退出失败');
                    return false;
                }
                _this.$message.success(message);
                _this.$router.push({ path: '/login' });
            }).catch(function(err) {
                _this.$message.error('网络连接失败');
            });
        }
    }
}
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
.el-menu {
    border-radius: 0;
}

.hamburger-container {
    padding: 0 20px;
    float: left;
    height: 60px;
    line-height: 60px;
    color: #48576A;
    cursor: pointer;
}

.hamburger-container:hover {
    color: #59A7FC;
}

.permission-text {
    float: right;
    height: 60px;
    line-height: 60px;
    color: #48576A;
    cursor: pointer;
}
</style>