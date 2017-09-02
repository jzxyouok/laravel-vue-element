import Main from './components/common/main.vue';
import Signup from './components/common/signup.vue';
//首页
import Index from './components/index/index.vue';
//视频列表
import Video from './components/video/video.vue';
export default [{
    path: '/',
    component: Main,
    name: '首页',
    iconCls: '', //图标样式class
    noDropdown: true,
    children: [
        { path: 'index', component: Index, name: '首页', iconCls: 'el-icon-edit' },
        { path: 'signup', component: Signup, name: '注册页面', iconCls: 'el-icon-edit' }
    ]
}, {
    path: '/video',
    component: Main,
    name: '视频列表',
    iconCls: '', //图标样式class
    noDropdown: true,
    children: [
        { path: 'index', component: Video, name: '视频列表', iconCls: 'el-icon-edit' }
    ]
}]