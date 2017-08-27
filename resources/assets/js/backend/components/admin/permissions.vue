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
        //this.getList();
    },
    methods: {
        getList() {
          
        },
        trashed(id) {
          
        },
        changeStatus(id, status) {
          
        },
        formatNum(row) {
          
        },
        formatMenus(row) {
          
        },
        formatStatus(row) {
          
        },
        toLink(link) {
          
        }
    }
  }
</script>