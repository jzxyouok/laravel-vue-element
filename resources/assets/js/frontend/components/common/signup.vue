<template>
    <div class="content-container signup-container">
        <el-row :gutter="12">
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="signup-detail-box">
                    <div class="signup-header">
                        <a href="javascript:;" class="active"><i class="fa fa-envelope-o"></i>邮箱注册</a>
                        <a href="javascript:;"><i class="fa fa-mobile-phone"></i>手机注册</a>
                    </div>
                    <div class="signup-body">
                        <el-form label-position="right" label-width="80px" :model="signupForm" :rules="signupRules" ref="signupForm">
                            <el-form-item label="头像" prop="face">
                                <el-upload class="avatar-uploader" action="https://jsonplaceholder.typicode.com/posts/" :show-file-list="false" :on-success="uploadFaceSuccess" :before-upload="beforeUploadFace">
                                    <img v-if="signupForm.face" :src="signupForm.face" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>（不传默认使用系统头像）
                            </el-form-item>
                            <el-form-item label="用户名" prop="username">
                                <el-input v-model="signupForm.username" placeholder="登录账号，2-15个字符"></el-input>
                            </el-form-item>
                            <el-form-item label="电子邮件" prop="email">
                                <el-input v-model="signupForm.email" placeholder="电子邮件，使用常用的邮箱"></el-input>
                            </el-form-item>
                            <el-form-item label="密码" prop="password">
                                <el-input type="password" v-model="signupForm.password" placeholder="登录密码，6-30个字符"></el-input>
                            </el-form-item>
                            <el-form-item label="确认密码" prop="repassword">
                                <el-input type="password" v-model="signupForm.repassword" placeholder="再次输入密码"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="signupSubmit('signupForm')">立即注册</el-button>
                                <el-button @click="signupReset('signupForm')">重置</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </el-col>
            <el-col :xs="12" :sm="12" :md="12" :lg="12">
                <div class="signup-other-type">
                    <h3 class='type-header'><span>使用其它方式登录</span></h3>
                    <div class='type-detail'>
                        <p><el-button type="info"><i class="fa fa-qq"></i>使用QQ登录</el-button></p>
                        <p><el-button type="success"><i class="fa fa-weixin"></i>使用微信登录</el-button></p>
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
            if (value !== this.signupForm.password) {
                callback(new Error('密码输入不一致!'));
            } else {
                callback();
            }
        };
        return {
            signupForm: {
                face: '',
                username: '',
                email: '',
                password: '',
                repassword: ''
            },
            signupRules: {
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
        signupSubmit(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        signupReset(formName) {
            window._this.$refs[formName].resetFields();
        },
        uploadFaceSuccess(res, file) {
            window._this.signupForm.imageUrl = URL.createObjectURL(file.raw);
        },
        beforeUploadFace(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
                window._this.$message.error('上传头像图片只能是 JPG 格式!');
            }
            if (!isLt2M) {
                window._this.$message.error('上传头像图片大小不能超过 2MB!');
            }
            return isJPG && isLt2M;
        }
    }
}
</script>