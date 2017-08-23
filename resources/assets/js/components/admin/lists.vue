<template>
    <div class="app-container">
      <tableHeader v-on:create="create" v-on:getList="getList">
        <el-input v-model="searchForm.username" placeholder="请输入账户名" style="width: 200px;"></el-input>
        <el-select v-model="searchForm.permission_id" placeholder="请选择管理员等级">
          <el-option label="全部权限" value=""></el-option>
          <el-option v-for="item in options.permission" :key="item.id" :label="item.text" :value="item.id"></el-option>
        </el-select>
      </tableHeader>
      <el-table :data="tableData" border style="width: 100%">
        <el-table-column prop="username" label="用户名"></el-table-column>
        <el-table-column prop="email" label="电子邮件"></el-table-column>
        <el-table-column label="管理员等级">
          <template scope="scope">
              {{scope.row.permission_id | formatByOptions(options.permission, 'id', 'text')}}
          </template>
        </el-table-column>
        <el-table-column prop="last_login_ip" label="最后登录ip"></el-table-column>
        <el-table-column prop="last_login_time" label="最后登录时间"></el-table-column>
        <el-table-column label="状态">
          <template scope="scope">
              {{scope.row.status | formatByOptions(options.status, 'value', 'text')}}
          </template>
        </el-table-column>
        <el-table-column  align="center" label="操作" width="200">
            <template scope="scope">
              <router-link to="/home"><el-button size="mini" type="info">操作记录</el-button></router-link>
              <el-button size="mini" type="success" @click="detail(scope.row.id)">编辑</el-button>
              <el-button size="mini" type="danger" @click="trashed(scope.row.id)">删除</el-button>
            </template>
        </el-table-column>
      </el-table>
      <pagination ref="pagination" v-on:getList="getList"></pagination>
      <el-dialog :title="formTitle" :visible.sync="formVisible" :close-on-click-modal="false" :close-on-press-escape="false">
        <el-form class="small-space" :model="form" :rules="rules" ref="form" label-position="left" label-width="100px">
          <input type="hidden" v-model="form.id">
          <el-form-item label="用户名" prop="username">
              <el-input v-model="form.username" placeholder="登录账号，2-15个字符"></el-input>
          </el-form-item>
          <el-form-item label="登录邮箱" prop="email">
              <el-input v-model="form.email" placeholder="登录邮箱，使用常用的邮箱"></el-input>
          </el-form-item>
          <el-form-item label="密码" prop="password">
              <el-input type="password" v-model="form.password" placeholder="登录密码，6-30个字符"></el-input>
          </el-form-item>
          <el-form-item label="确认密码" prop="repassword">
              <el-input type="password" v-model="form.repassword" placeholder="再次输入密码"></el-input>
          </el-form-item>
          <el-form-item label="管理员等级" prop="permission_id">
            <el-select v-model="form.permission_id" placeholder="请选择管理员等级">
              <el-option v-for="item in options.permission" :key="item.id" :label="item.text" :value="item.id + ''"></el-option>
            </el-select>
          </el-form-item>
          <el-form-item label="状态" prop="status">
            <el-select v-model="form.status" placeholder="请选择管理员状态">
              <el-option v-for="item in options.status" :key="item.value" :label="item.text" :value="item.value + ''"></el-option>
            </el-select>
          </el-form-item>
        </el-form>
        <dialogFooter v-on:submit="submit(formName = 'form')" v-on:close="close"></dialogFooter>
      </el-dialog>
    </div>
</template>
<script>
  import Pagination from '../common/pagination';
  import TableHeader from '../common/tableHeader';
  import DialogFooter from '../common/dialogFooter';
  export default {
    components: {
      'pagination': Pagination,
      'tableHeader': TableHeader,
      'dialogFooter': DialogFooter
    },
    data() {
      var checkRepassword = (rule, value, callback) => {
        if (value !== this.form.password) {
          callback(new Error('密码输入不一致!'));
        } else {
          callback();
        }
      };
      return {
        formTitle: '',
        formVisible: false,
        tableData: [],
        form: {
          id: '',
          username: '',
          email: '',
          password: '',
          repassword: '',
          permission_id: '',
          status: ''
        },
        searchForm: {
          username: '',
          permission_id: '',
        },
        options: {
          permission: '',
          status: ''
        },
        rules: {
          username: [
            { required: true, message: '请输入用户名', trigger: 'blur' },
            { min: 2, max: 15, message: '长度在 2 到 15 个字符', trigger: 'blur' }
          ],
          email: [
            { required: true, message: '请输入登录邮箱', trigger: 'blur' },
            { type: 'email', message: '请输入正确的邮箱地址', trigger: 'blur,change' }
          ],
          permission_id: [
            { required: true, message: '请选择管理员等级', trigger: 'blur' },
          ],
          status: [
            { required: true, message: '请选择管理员状态', trigger: 'blur' },
          ]
        },
        passwordRules: [
          { required: true, message: '请输入登录密码', trigger: 'blur' },
          { min: 6, max: 30, message: '长度在 6 到 30 个字符', trigger: 'blur' }
        ],
        repasswordRules: [
          { required: true, message: '请再次输入密码', trigger: 'blur' },
          { validator: checkRepassword, trigger: 'blur' }
        ],
      }
    },
    mounted() {
      this.getList();
    },
    methods: {
      getList() {
          let _this = this;
          let paramsData = {'data': {'searchForm': _this.searchForm}};
          axios.get('/backend/admins?page=' + _this.$refs.pagination.pageData.current_page, {params: paramsData}).then(response => {
            let data = response.data;
            _this.tableData = data.data.lists.data;
            _this.options.permission = data.data.permission;
            _this.options.status = data.dicts.status;
            _this.$refs.pagination.pageData.per_page = parseInt(data.data.lists.per_page);
            _this.$refs.pagination.pageData.current_page = parseInt(data.data.lists.current_page);
            _this.$refs.pagination.pageData.total = parseInt(data.data.lists.total);
          })
        },
      detail(id) {
        let _this = this;
        _this.formTitle = '修改';
        delete _this.rules.password;
        delete _this.rules.repassword;
        _this.tableData.forEach (function (item) {
          if (item.id === id) {
            item.password = '';
            _this.form = Vue.copyObj(item);
            _this.formVisible = true;
            return true;
          }
        });
      },
      submit(formName) {
        let _this = this;
        _this.$refs[formName].validate((valid) => {
          if (valid) {
            _this.$store.state.submitLoading = true;
            if (!_this.form.id) {
              var method = 'post', url = '/backend/admins', params = {'data': _this.form};
            } else {
              var method = 'put', url = '/backend/admins/' + _this.form.id, params = {'data': _this.form};
            }
            axios[method](url, params).then(response => {
              _this.$store.state.submitLoading = false;
              let data = response.data;
              if (!data.status) {
                _this.$message.error(data.message);
                return false;
              }
              _this.$message.success(data.message);
              _this.formVisible = false;
              _this.getList();
            }).catch(function(response) {
              _this.$store.state.submitLoading = false;
            });
          }
        });
      },
      trashed(id) {
        let _this = this;
        _this.$confirm('确定删除这个管理员吗').then(() => {
          axios.delete('/backend/admins/' + id).then(response => {
              _this.$message.success(response.data.message);
              Vue.removeOneData(_this.tableData, id);
          });
        }).catch(function(response) {
          console.log(response);
        });
      },
      close() {
        this.formVisible = false;
        Vue.resetForm(this.form);
        this.$refs.form.resetFields();
      },
      create() {
        this.formTitle = '添加管理员';
        Vue.resetForm(this.form);
        if(!this.rules.password) {
          this.rules.password = this.passwordRules;
        }
        if(!this.rules.repassword) {
          this.rules.repassword = this.repasswordRules;
        }
        this.formVisible = true;
      }
    }
  }
</script>
