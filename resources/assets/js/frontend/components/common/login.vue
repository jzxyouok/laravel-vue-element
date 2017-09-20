<template>
    <div class="content-container login-container">
        <el-row :gutter="12">
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="login-detail-box">
                    <div class="login-header">
                        <a href="javascript:;">账户登录</a>
                    </div>
                    <div class="login-body">
                        <el-form label-position="right" label-width="80px" :model="loginForm" :rules="loginRules" ref="loginForm">
                            <el-form-item label="登录账号" prop="account">
                                <el-input v-model="loginForm.account" placeholder="登录用户名/电子邮箱"></el-input>
                            </el-form-item>
                            <el-form-item label="密码" prop="password">
                                <el-input type="password" v-model="loginForm.password" placeholder="登录密码，6-30个字符"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-checkbox-group v-model="loginForm.remember">
                                    <el-checkbox label="记住密码" name="remember"></el-checkbox>
                                </el-checkbox-group>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="loginSubmit('loginForm')">登录</el-button>
                                <el-button @click="loginReset('loginForm')">重置</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </el-col>
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="login-other-type">
                    <h3 class='type-header'><span>使用其它方式登录</span></h3>
                    <div class='type-detail'>
                        <p>
                            <el-button type="info"><i class="fa fa-qq"></i>使用QQ登录</el-button>
                        </p>
                        <p>
                            <el-button type="success"><i class="fa fa-weixin"></i>使用微信登录</el-button>
                        </p>
                    </div>
                </div>
            </el-col>
        </el-row>
    </div>
</template>
<script type="text/javascript">
export default {
    data() {
        return {
            loginForm: {
                account: '',
                password: '',
                remember: ''
            },
            loginRules: {
                account: [
                    { required: true, message: '请输入用户名或邮箱账号', trigger: 'blur' },
                    { min: 2, max: 50, message: '登录账号不正确', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '请输入登录密码', trigger: 'blur' },
                    { min: 6, max: 30, message: '登录密码不正确', trigger: 'blur' }
                ]
            }
        };
    },
    mounted() {
        window._this = this;
    },
    methods: {
        loginSubmit(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        loginReset(formName) {
            window._this.$refs[formName].resetFields();
        }
    }
}
</script>