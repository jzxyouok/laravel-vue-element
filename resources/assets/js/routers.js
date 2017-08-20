import Login from './components/common/login.vue';
import Main from './components/common/main.vue';

/*首页*/
import Index from './components/index/index.vue';

export default[
    {
        path: '/login',
        component: Login,
        name: '登录',
        hidden: true
    },
    {
        path: '/index',
        component: Main,
        name: '首页',
        iconCls: 'fa fa-television',//图标样式class
        noDropdown: true,
        menu_id: 2,
        meta: { menu_id: 2 },
        children: [
            { path: 'index', component: Index, name: '首页', iconCls: 'el-icon-edit', menu_id: 21, meta: { menu_id: 1 }},
        ]
    },
]