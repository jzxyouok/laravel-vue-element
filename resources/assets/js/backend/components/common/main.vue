<template>
    <div class="container">
        <el-row :gutter="20" style="margin: 0px; padding: 0px;">
            <div class="sidebar-wrapper">
                <Herader-component class="sidebar-container"></Herader-component>
            </div>
            <div class="main-container">
                <sidebar-component></sidebar-component>
                <div class="app-main">
                    <router-view></router-view>
                </div>
            </div>
        </el-row>
    </div>
</template>
<script type="text/javascript">
    import HeaderComponent from './header-component.vue';
    import sidebarComponent from './sidebar-component.vue';
    export default {
        name: 'main',
        components: {
            'Herader-component':HeaderComponent,
            'sidebar-component':sidebarComponent
        },
        computed: {
            
        }
    }
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
    
</style>