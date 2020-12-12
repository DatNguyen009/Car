<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/Car/resources/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="/Public/Library/vue.js"></script>

</head>

<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Manager</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/MVC/models/logout_admin.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/Car/public/Admin/Manager">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Lịch đặt lái thử
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/Car/public/Admin/ManagerUser">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            Quản lý User
                        </a>
                        <a class="nav-link" href="/Car/public/Admin/ManagerCar">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý Xe
                        </a>
                        <a class="nav-link" href="/Car/public/Admin/AddCar">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Thêm xe
                        </a>
                        <a class="nav-link" href="/Car/public/Admin/AddBill">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Thêm hóa đơn
                        </a>
                        <a class="nav-link" href="/Car/public/Admin/ListBuyCar">
                            <div class="sb-nav-link-icon"><i class="fa fa-coins"></i></div>
                            Danh sách hóa đơn
                        </a>
                        <a class="nav-link" href="/Car/public/Admin/CarSales">
                            <div class="sb-nav-link-icon"><i class="fa fa-coins"></i></div>
                            Thống kê
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Thêm sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    {{-- <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                    <?php endif; ?> --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('AddCar')}}" method="post" enctype="multipart/form-data">
                                    <input id="token" type="hidden" name="_token" value="{!!  csrf_token() !!}">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <div class="add_infor">
                                            <p>Tên xe</p>

                                            <input id="tensp" type="text" name="tensp" class="form-control" value="">

                                            <p>Giá xe</p>
                                            <input id="giasp" type="text" name="giasp" class="form-control" value="">
                                            <p>Ảnh Xe</p>
                                            <label for="fileSelect">Tên file:</label>
                                            <input type="file" name="photo" id="fileSelect" multiple>
                                            <p><strong>Ghi chú:</strong> Chỉ cho phép định dạng .jpg, .jpeg, .gif và
                                                kích
                                                thước tối đa tệp tin là 5MB.</p>
                                            <p>Màu</p><span class="noteinadd"
                                                style="position: absolute;color: red;font-size: 13px;transform: translateY(-20px);">(có
                                                thể chọn nhiều cách nhau bởi dấu ,)</span>
                                            <input id="color" type="text" name="color" class="form-control"
                                                placeholder="đỏ,hồng">
                                                
                                            <p>Chiều dài * chiều rộng * chiều cao xe</p>
                                            <span class="noteinadd"
                                                style="position: absolute;color: red;font-size: 13px;transform: translateY(-20px);">(vd:
                                                0% chỉ cần nhập 0)</span>
                                            <input id="DRC" type="text" name="DRC" class="form-control" value="">
                                            <p>Trọng lượng xe</p>
                                            <input id="weight" type="text" name="weight" class="form-control" value="">
                                            <p>Động cơ xe</p>
                                            <input id="engine" type="text" name="engine" class="form-control" value="">
                                            <p>Mã lực xe</p>
                                            <input id="Horsepower" type="text" name="Horsepower" class="form-control" value="">
                                            <p>Công suất cực đại của xe</p>
                                            <input id="maxCapacity" type="text" name="maxCapacity" class="form-control" value="">
                                            <p>Mô men xoán cực đại của xe</p>
                                            <input id="MaxTorque" type="text" name="MaxTorque" class="form-control" value="">
                                            <p>Giây tăng tốc được 100K/h</p>
                                            <input id="Acceleration" type="text" name="Acceleration" class="form-control" value="">
                                            <p>Vận tốc tối đa </p>
                                            <input id="MaxSpeed" type="text" name="MaxSpeed" class="form-control" value="">
                                            <p>Sử dụng loại nhiện liệu</p>
                                            <input id="TypeOfFuel" type="text" name="TypeOfFuel" class="form-control" value="">
                                            <p>Tiết kiệm nhiện liệu trong thành phố</p>
                                            <input id="City" type="text" name="City" class="form-control" value="">
                                            <p>Tiết kiểm nhiên liệu ngoài thành phố</p>
                                            <input id="Local" type="text" name="Local" class="form-control" value="">
                                            <p>Tiết kiệm nhiên liệu trong thành phố và ngoài thành phố</p>
                                            <input id="Combine" type="text" name="Combine" class="form-control" value="">
                                            <p>Miêu tả</p>
                                            <textarea id="mota" v-model="description" name="mieuta" cols="127" rows="5"
                                                value=""></textarea>
                                            {{-- <span style="white-space: pre-line;">{{ description }}</span> --}}
                                            <br>
                                            <p>Số lượng sản phẩm thêm vào</p>
                                            <input id="soluong" type="number" name="soluong" min="0" max="100"
                                                class="form-control" value="">
                                        </div>

                                    </table>
                                    <button type="submit" name="submit" value="Upload file"
                                        class="btn btn-outline-primary">Thêm</button>
                                </form>
                                <div class="note" style="color:red;padding-top: 20px;line-height: 7px;font-size: 11px;">
                                    <p>Lưu ý:</p>
                                    <p>Những trường có dấu * là bắt buộc nhập</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        new Vue({
            el: '.table-responsive',
            data: {
                description: '',
            }
        })

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>

</html>
