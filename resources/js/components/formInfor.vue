<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
                        <h3 style="color: #ec2c73; text-align: center;">Thông tin cá nhân</h3>
                        <el-alert v-if="notify == 1" title="Cập nhật thông tin cá nhân thành công" type="success"></el-alert>
                        <el-alert v-if="notify == 2" title="Cập nhật thông tin cá nhân thất bại" type="error"></el-alert>
                    </div>
                    
                    <div class="card-body">
                       <form @submit="checkForm" method="post">
                            <strong>Email</strong>
                            <input id="email"  type="text" class="form-control" :value="email" disabled style="margin-bottom: 1rem;">
                            <strong>Tên khách hàng</strong>
                            <input id="customer" type="text" class="form-control" :value="customer" style="margin-bottom: 1rem;">
                            <strong>SDT</strong>
                            <input id="sdt" type="text" class="form-control" :value="sdt" style="margin-bottom: 1rem;">
                            <strong>Địa chỉ</strong>
                            <input id="address" type="text" class="form-control" :value="address" style="margin-bottom: 1rem;">
                            <button type="submit" class="btn btn-success btn_Update">Cập nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import ElementUI from 'element-ui';
    import 'element-ui/lib/theme-chalk/index.css';
    
    Vue.use(ElementUI);
    export default {
     
        data() {
            return {
                notify: 0,
            };
        },
        props:{
            email: String,
            customer: String,
            sdt: String,
            address: String,
        },
        methods: {
            
            checkForm(e) {
                e.preventDefault();
                var updateCustomer = document.getElementById('customer').value;
                var updateSDT = document.getElementById('sdt').value;
                var updateAddress = document.getElementById('address').value;
                axios.post('/Car/public/check', {
                    email: this.email,
                    customer: updateCustomer,
                    sdt: updateSDT,
                    address: updateAddress,
                })
                .then((res)=>{
                    if (res.data == 'success') {
                        return this.notify = 1;
                    } else {
                        return this.notify = 2;
                    }
                  
                })
                .then(function (response) {
                    setTimeout(reloal, 1000);
                    function reloal() {
                        location.reload();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
           
        }
    }
  
</script>

<style>
    @import url("//unpkg.com/element-ui@2.14.1/lib/theme-chalk/index.css");
    .btn_Update{
        display: flex;
        margin: 2rem auto;
        
    }
   
</style>