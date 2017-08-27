import Main from './components/common/main.vue';
/*首页*/
import Index from './components/index/index.vue';
export default [{
    path: '/',
    component: Main,
    name: '首页',
    iconCls: '', //图标样式class
    noDropdown: true,
    children: [
        { path: 'index', component: Index, name: '首页', iconCls: 'el-icon-edit' }
    ]
}]