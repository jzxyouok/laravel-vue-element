<template>
    <div class="content-container register-container">
        <el-row :gutter="12">
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="register-detail-box">
                    <div class="register-header">
                        <a href="javascript:;" class="active"><i class="fa fa-envelope-o"></i>邮箱注册</a>
                        <a href="javascript:;"><i class="fa fa-mobile-phone"></i>手机注册</a>
                    </div>
                    <div class="register-body">
                        <el-form label-position="right" label-width="80px" :model="registerForm" :rules="registerRules" ref="registerForm">
                            <el-form-item label="头像" prop="face">
                                <el-upload class="avatar-uploader" action="/frontend/register/upload-face" :show-file-list="false" :on-success="uploadFaceSuccess" :before-upload="beforeUploadFace" :headers="uploadHeaders">
                                    <img v-if="registerForm.face" :src="registerForm.face" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>（不传默认使用系统头像）
                            </el-form-item>
                            <el-form-item label="用户名" prop="username">
                                <el-input v-model="registerForm.username" placeholder="登录账号，2-15个字符"></el-input>
                            </el-form-item>
                            <el-form-item label="电子邮件" prop="email">
                                <el-input v-model="registerForm.email" placeholder="电子邮件，使用常用的邮箱"></el-input>
                            </el-form-item>
                            <el-form-item label="密码" prop="password">
                                <el-input type="password" v-model="registerForm.password" placeholder="登录密码，6-30个字符"></el-input>
                            </el-form-item>
                            <el-form-item label="确认密码" prop="repassword">
                                <el-input type="password" v-model="registerForm.repassword" placeholder="再次输入密码"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="registerSubmit('registerForm')" :loading="registerSubmitLoading">立即注册</el-button>
                                <el-button @click="registerReset('registerForm')">重置</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </el-col>
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="register-other-type">
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
        var checkRepassword = (rule, value, callback) => {
            if (value !== this.registerForm.password) {
                callback(new Error('密码输入不一致!'));
            } else {
                callback();
            }
        };
        return {
            registerSubmitLoading: false,
            registerForm: {
                face: '',
                username: '',
                email: '',
                password: '',
                repassword: ''
            },
            uploadHeaders: {
                'X-CSRF-TOKEN': window.laravelCsrfToken
            },
            registerRules: {
                username: [
                    { required: true, message: '请输入用户名', trigger: 'blur' },
                    { min: 2, max: 20, message: '长度在 2 到 15 个字符', trigger: 'blur' }
                ],
                email: [
                    { required: true, message: '请输入登录邮箱', trigger: 'blur' },
                    { type: 'email', message: '请输入正确的邮箱地址', trigger: 'blur,change' }
                ],
                password: [
                    { required: true, message: '请输入登录密码', trigger: 'blur' },
                    { min: 6, max: 30, message: '长度在 6 到 30 个字符', trigger: 'blur' }
                ],
                repassword: [
                    { required: true, message: '请再次输入密码', trigger: 'blur' },
                    { validator: checkRepassword, trigger: 'blur' }
                ]
            }
        };
    },
    mounted() {
        window._this = this;
    },
    methods: {
        registerSubmit(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    window._this.registerSubmitLoading = true;
                    axios.post('/frontend/register/create-user', { 'data': window._this.registerForm }).then(response => {
                        let data = response.data;
                        if (!data.status) {
                            window._this.$message.error(data.message);
                            window._this.registerSubmitLoading = false;
                            return false;
                        }
                        window._this.$notify({
                            title: '成功',
                            message: data.message,
                            type: 'success'
                        });
                        let params = {
                            'id': data.data.id,
                            'email': data.data.email
                        };
                        window._this.$router.push({ path: '/register-active', query: params });
                    }).catch(function(response) {
                        window._this.registerSubmitLoading = false;
                    });
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        registerReset(formName) {
            window._this.$refs[formName].resetFields();
        },
        uploadFaceSuccess(res, file) {
            window._this.registerForm.face = URL.createObjectURL(file.raw);
        },
        beforeUploadFace(file) {
            let fileType = file.type;
            let fileSize = file.size / 1024;
            let truePictureType = ['image/jpeg', 'image/jpg', 'image/png', 'image/x-png'];
            if (truePictureType.indexOf(fileType) == -1) {
                window._this.$message.error('请上传正确的头像图片的格式（jpg/png）');
                return false;
            }
            if (fileSize > 500) {
                window._this.$message.error('上传头像图片大小不能超过 500KB');
                return false;
            }
            return true;
        }
    }
}
</script>