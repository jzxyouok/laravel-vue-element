<template>
    <div class="app-container">
      <el-row class="filter-container">
          <el-button type="primary" icon="plus" @click="toLink('/admin/permissions/create')">添加</el-button>
      </el-row>
      <el-table :data="tableData" border style="width: 100%">
        <el-table-column prop="text" label="权限等级" width="180"></el-table-column>
        <el-table-column prop="num" label="当前人数" width="180" :formatter="formatNum"></el-table-column>
        <el-table-column prop="include_menus" label="权限节点数" width="180" :formatter="formatMenus"></el-table-column>
        <el-table-column prop="status" label="状态" width="180" :formatter="formatStatus"></el-table-column>
        <el-table-column  align="center" label="操作">
            <template scope="scope">
              <el-button size="small" type="info" @click="toLink('/admin/permissions/detail/' + scope.row.id)">查看详情</el-button>
              <el-button size="small" type="success" @click="changeStatus(scope.row.id, 0)" v-if="scope.row.status == 1">禁用</el-button>
              <el-button size="small" type="warning" @click="changeStatus(scope.row.id, 1)" v-else>启用</el-button>
              <el-button size="small" type="danger" @click="trashed(scope.row.id)">删除</el-button>
            </template>
        </el-table-column>
      </el-table>
      <pagination ref="pagination" v-on:getList="getList"></pagination>
    </div>
</template>
<script>
  import Pagination from '../common/pagination';
  import TableHeader from '../common/tableHeader';
  import {get, trashed, post} from '../../request.js';
  export default {
    components: {
      'pagination': Pagination,
      'tableHeader': TableHeader,
    },
    data() {
      return {
        formTitle: '',
        formVisible: false,
        tableData: [],
        options: {
          statusOptions: '',
          numOptions: '',
        },
      }
    },
    mounted() {
        this.getList();
    },
    methods: {
        getList() {
          let _this = this;
          let params = {'data': {'searchForm': _this.searchForm}};
          get('/backend/permissions?page=' + _this.$refs.pagination.pageData.current_page, params).then(data => {
            _this.tableData = data.data.lists.data;
            _this.options.statusOptions = data.data.statusOptions;
            _this.options.numOptions = data.data.numOptions;
            _this.$refs.pagination.pageData.per_page = parseInt(data.data.lists.per_page);
            _this.$refs.pagination.pageData.current_page = parseInt(data.data.lists.current_page);
            _this.$refs.pagination.pageData.total = parseInt(data.data.lists.total);
          })
        },
        trashed(id) {
          let _this = this;
          _this.$confirm('确定删除这个权限等级吗').then(() => {
            trashed('/backend/permissions/' + id).then(data => {
                _this.$message.success(data.message);
                Vue.removeOneData(_this.tableData, id);
            });
          });
        },
        changeStatus(id, status) {
          let _this = this;
          _this.$confirm('确定更新这个权限等级吗').then(() => {
            let params = {'data': {'permission_id': id, 'status': status}};
            post('/backend/permissions/change-status', params).then(data => {
              if(!data.status) {
                _this.$message.error(data.message);
                return false;
              }
              _this.$message.success(data.message);
              _this.tableData.forEach(function(item) {
                if(item.id == id) {
                  item.status = status;
                }
              });
            });
          });
        },
        formatNum(row) {
          let text = '0';
          if (this.options.numOptions[row.id]) {
            return text = this.options.numOptions[row.id];
          }
          return text;
        },
        formatMenus(row) {
          let text = '-';
          let arr = row.include_menus.split(",");
          if (arr.length > 0) {
            return text = arr.length;
          }
          return text;
        },
        formatStatus(row) {
          let text = '-';
          if (this.options.statusOptions[row.status]) {
            return text = this.options.statusOptions[row.status];
          }
          return text;
        },
        toLink(link) {
          this.$router.push({ path: link });
        }
    }
  }
</script>