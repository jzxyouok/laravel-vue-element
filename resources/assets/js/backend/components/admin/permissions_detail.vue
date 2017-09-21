<template>
    <div class="app-container">
        <el-form ref="form" :model="form" label-width="100px">
            <el-form-item label="权限名称">
                <el-input v-model="form.text"></el-input>
            </el-form-item>
            <el-form-item label="权限名称">
                <el-tree :data="permission_data" show-checkbox node-key="menu_id" ref="tree" :default-checked-keys="form.include_menus" :props="defaultProps">
                </el-tree>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="toLink('/admin/permissions')">返回</el-button>
                <el-button type="primary" @click="submit">保存</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script type="text/javascript">
import { save } from '../../request.js';
export default {
    data() {
        return {
            permission_data: this.$router.options.routes,
            defaultProps: {
                children: 'children',
                label: 'name'
            },
            include_menus: [],
            form: {}
        }
    },
    created() {
        this.getPermissionDetail(this.$route.params.id);
    },
    methods: {
        getPermissionDetail(id) {
            let _this = this;
            axios.get('/backend/permissions/' + id).then(function(res) {
                _this.form = res.data.data.permissionData;
                _this.$refs.tree.setCheckedKeys(res.data.data.permissionData.include_menus);;
            });
        },
        submit() {
            let _this = this;
            _this.form.include_menus = _this.$refs.tree.getCheckedKeys();
            var method = 'put',
                url = '/backend/permissions/' + _this.form.id,
                params = { 'data': _this.form };
            save(method, url, params).then(data => {
                if (!data.status) {
                    _this.$message.error(data.message);
                    return false;
                }
                _this.$message.success(data.message);
            });
        },
        toLink(url) {
            this.$router.push({ path: url });
        }
    }
}
</script>