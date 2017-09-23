<template>
    <el-menu :unique-opened='true' mode="vertical" theme="dark" :default-active="$route.path">
        <template v-for="item in $router.options.routes" v-if="!item.hidden">
            <el-submenu :index="item.name" v-if="!item.noDropdown">
                <template slot="title">
                    <i :class="item.iconCls"></i>&nbsp;&nbsp;&nbsp;{{item.name}}
                </template>
                <router-link v-for="child in item.children" :key="child.path" v-if="!child.hidden" class="title-link" :to="item.path+'/'+child.path">
                    <el-menu-item :index="item.path+'/'+child.path">
                        {{child.name}}
                    </el-menu-item>
                </router-link>
            </el-submenu>
            <router-link v-if="item.noDropdown&&item.children.length>0" :to="item.path+'/'+item.children[0].path">
                <el-menu-item :index="item.path+'/'+item.children[0].path">
                    <i :class="item.iconCls"></i>&nbsp;&nbsp;&nbsp;{{item.children[0].name}}
                </el-menu-item>
            </router-link>
        </template>
    </el-menu>
</template>
<style rel="stylesheet/scss" lang="scss" scoped>
.el-menu {
    min-height: 100%;
    border-radius: 0;
}

.el-submenu .el-menu-item:active,
.el-submenu .el-menu-item:hover {
    text-decoration: none;
}

.wscn-icon {
    margin-right: 10px;
}

.hideSidebar .title-link {
    display: inline-block;
    padding-left: 10px;
}
</style>
<script type="text/javascript">
export default {
    data() {
        return {
            permission_routers: '',
        };
    },
    mounted() {

    },
    methods: {
        getMenu: function() {
            axios.get('backend/menu-list').then(function(res) {
                permission_routers = res.data.lists;
            }).catch(function(res) {

            });
        }
    }
}
</script>