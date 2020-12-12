<template>
  <div class="container-fluid">
        <h1 class="mt-4">Thêm hóa đơn</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i> Hóa đơn
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <input id="token" type="hidden" name="_token" value="{!!  csrf_token() !!}">
                    <div class="add_infor">
                            <p>Tên xe</p>
                            <select class="custom-select" id="nameCar">
                                <option selected>Choose...</option>
                                <option v-for="(item,index) in listData" :key="index" :value="item.prod_id">{{item.prod_name}}</option>
                            </select>
                            <p>Email</p>
                             <select class="custom-select" id="user">
                                <option selected>Choose...</option>
                                <option v-for="(item,index) in listUser" :key="index" :value="item.username">{{item.username}}</option>
                            </select>

                            <span style="font-weight: bold;display: block;padding: 10px 0;">Ngày đặt lịch</span>
                            <input id="AppointmentSchedule" type="text" name="AppointmentSchedule" class="form-control"  placeholder="2020-11-11 09:00">
                            <p>Ngày mua</p>
                            <input id="dateBuy" type="text" name="dateBuy" class="form-control" placeholder="2020-11-11 09:00">
                            <span class="error text-danger"></span>
                        </div>
                    <button class="btn btn-outline-primary" @click="submit()">Thêm</button>
                  
                    <div class="note" style="color:red;padding-top: 20px;line-height: 7px;font-size: 11px;">
                        <p>Lưu ý:</p>
                        <p>Những trường có dấu * là bắt buộc nhập</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from 'axios';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

export default {
    data() {
        return {
            listData: [],
            listUser: [],
        }
    },
    created() {
        Axios.get('http://localhost:8080/Car/public/api')
        .then(res => {
            this.listData = res.data;
        })
        .catch(err => console.log(err))


        Axios.get('http://localhost:8080/Car/public/api/user')
        .then(res => this.listUser = res.data)
        .catch(err => console.log(err))
    },

    methods: {
        submit(){
            let nameCar = document.getElementById('nameCar');
            let user = document.getElementById('user');
            let dateSchedule = document.getElementById('AppointmentSchedule').value;
            let dateBuy = document.getElementById('dateBuy').value;
            let error = document.querySelector(".error");
            console.log(dateBuy);
            if (dateBuy == '') {
                error.innerHTML = 'Vui lòng nhập ngày giờ mua';
            }
            else{
                Axios.post('/Car/public/Admin/addBill',{
                    nameCar: nameCar.value,
                    user: user.value,
                    dateSchedule: dateSchedule,
                    dateBuy: dateBuy
                })
                .then(res => {
                    if (res.data == 'success') {
                        this.$message({
                            message: 'Thêm hóa đơn thành công!!!',
                            type: 'success'
                        })

                    setTimeout(() => {
                            location.reload();
                    }, 2000);
                    } else {
                        this.$message({
                            message: 'Thêm hóa đơn không thành công!!!',
                            type: 'error'
                        })
                    }
                })
                .catch(err => console.log(err))
            }
            
            
        }
    },
}
</script>

<style>
@import url("//unpkg.com/element-ui@2.14.1/lib/theme-chalk/index.css");
.add_infor{
    border: none;
}
</style>