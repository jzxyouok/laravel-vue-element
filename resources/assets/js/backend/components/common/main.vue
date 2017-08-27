<template>
    <div class="container">
        <el-row :gutter="20" style="margin: 0px; padding: 0px;">
            <div class="sidebar-wrapper">
                <Sidebar class="sidebar-container"/>
            </div>
            <div class="main-container">
                <Navbar />
                <div class="app-main">
                    <router-view></router-view>
                </div>
            </div>
        </el-row>
    </div>
</template>
<script type="text/javascript">
    import Sidebar from './sidebar.vue';
    import Navbar from './navbar.vue';
    export default {
        name: 'main',
        components: {
            Sidebar,
            Navbar
        },
        computed: {
            
        }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
    
</style>