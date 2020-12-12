<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Car Management</title>
    <link rel="stylesheet" href="/Car/resources/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <style>
        .modal_watch {
            width: 70rem;
        }

        .modal-dialog.xem {
            margin: 5rem;
        }

    </style>
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
                        <a class="nav-link" href="/Car/public/Admin/CarSales">
                            <div class="sb-nav-link-icon"><i class="fa fa-coins"></i></div>
                            Danh sách bán xe
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
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    @if (SEssion::has('add_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('add_success') }}
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số xe
                                    <p>{{ $carCount }} </p>
                                </div>

                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- modal xem --}}

                    <div class="modal fade" id="xem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog xem" role="document">
                            <div class="modal-content modal_watch">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết XE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr class="text-center" style="font-size: 14px;width: max-content;">
                                                        <th>Động cơ</th>
                                                        <th>Mã lực</th>
                                                        <th>Công suất cực đại</th>
                                                        <th>Mô men xoắn cực đại</th>
                                                        <th>Tăng tốc</th>
                                                        <th>Vận tốc tối đa</th>
                                                        <th>SD nhiên liệu</th>
                                                        <th>TKNL trong thành phố</th>
                                                        <th>TKNL ngoài thành phố</th>
                                                        <th>TKNL trong và ngoài thành phố</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr class="text-center" style="font-size: 13px;">
                                                        <td id="modal_Engine">

                                                        </td>
                                                        <td id="modal_HorsePower" style="max-width:140px">

                                                        </td>
                                                        <td id="modal_MaxCapacity" style="max-width:140px;">

                                                        </td>
                                                        <td id="modal_MaxTorque">

                                                        </td>
                                                        <td id="modal_Acceleration">

                                                        </td>
                                                        <td id="modal_MaxSpeed" style="min-width: 92px;">

                                                        </td>
                                                        <td id="modal_TypeOfFuel">

                                                        </td>
                                                        <td id="modal_city" style="min-width: 92px;">

                                                        </td>
                                                        <td id="modal_local">

                                                        </td>
                                                        <td id="modal_combine" style="min-width: 92px;">

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal xem --}}


                    <!-- Modal -->
                    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết xe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tên xe</p>
                                    <div id="modal_name">

                                    </div>
                                    <p>Ảnh xe</p>
                                    <div id="modal_anh">

                                    </div>
                                    <p>Giá xe</p>
                                    <div id="modal_gia">

                                    </div>
                                    <p>DRC</p>
                                    <div id="modal_DRC">

                                    </div>
                                    <p>Trọng lượng</p>
                                    <div id="modal_weight">

                                    </div>
                                    <p>Động cơ</p>
                                    <div id="modal_Engine--update">

                                    </div>
                                    <p>Mã lực </p>
                                    <div id="modal_HorsePower--update">

                                    </div>
                                    <p>Công suất cực đại</p>
                                    <div id="modal_MaxCapacity--update">

                                    </div>
                                    <p>Mô men xoắn cực đại</p>
                                    <div id="modal_MaxTorque--update">

                                    </div>
                                    <p>Tăng tốc</p>
                                    <div id="modal_Acceleration--update">

                                    </div>
                                    <p>Vận tốc tối đa</p>
                                    <div id="modal_MaxSpeed--update">

                                    </div>
                                    <p>Sử dụng loại nhiên liệu</p>
                                    <div id="modal_TypeOfFuel--update">

                                    </div>
                                    <p>Tiết kiệm nhiên liệu trong thành phố</p>
                                    <div id="modal_city--update">

                                    </div>
                                    <p>Tiết kiệm nhiên liệu ngoài thành phố</p>
                                    <div id="modal_local--update">

                                    </div>
                                    <p>Tiết kiệm nhiên liệu trong và ngoài thành phố</p>
                                    <div id="modal_combine--update">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" name="submit" value="" class="btn btn-outline-primary"
                                        onclick="Modal_Update(sessionStorage.id)">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size:12px;">
                                            <th>STT</th>
                                            <th>Tên Xe</th>
                                            <th>Ảnh Xe</th>
                                            <th>Giá Xe</th>
                                            <th>D*R*C</th>
                                            <th>Trọng lượng</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($products as $row)
                                            <tr id="prod_<?php echo $row['prod_id']; ?>"
                                                style="font-size:13px;">

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row['prod_name'] }}</td>
                                                <td style="max-width:140px;"><img style="width: 50%;"
                                                        src="/Car/public/image/{{ $row['prod_img'] }}" alt=""> </td>
                                                <td>{{ number_format($row['prod_cost']) }} đ</td>
                                                <td>{{ $row['prod_DRC'] }} </td>
                                                <td>{{ $row['prod_Weight'] }} Kg </td>
                                                <td><button style="font-size:10px" ; type="button"
                                                        class="btn btn-success" onclick="Xem('{{ $row['prod_id'] }}')"
                                                        data-toggle="modal" data-target="#xem">Xem</button><button
                                                        style="font-size:10px" ; type="button" class="btn btn-warning"
                                                        onclick="Update('{{ $row['prod_id'] }}')" data-toggle="modal"
                                                        data-target="#update">Sửa</button><button style="font-size:10px"
                                                        ; type="button" class="btn btn-danger"
                                                        onclick="Del_Product({{ $row['prod_id'] }},'{{ $row['prod_img'] }}')">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            <p>Lưu ý:</p>
                            <p>Nút sửa: để xem update sản phẩm</p>
                            <p>Nút xóa: để xóa sản phẩm</p>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Created Đạt Nguyễn</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        function Del_Product(prod_id, prod_img) {
            alertify.confirm('Xóa sản phẩm', 'Bạn có chắc chắn muốn xóa xe này không?',
                function() {
                    alertify.success('Xóa thành công');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('CarDelete.post') }}",
                        method: "POST",
                        data: {
                            prod_id: prod_id,
                            prod_img: prod_img,
                        },
                        success: function(response) {
                            console.log(response);

                            if (response == "success") {
                                setTimeout(reloal, 2000);

                                function reloal() {
                                    location.reload();
                                }
                            }
                            else{
                                alert('Khong tim thay file');
                            }

                        }
                    })
                },
                function() {
                    alertify.error('Xóa không thành công')
                });
        }
        var modal_name = document.querySelector("#modal_name");
        var modal_anh = document.querySelector("#modal_anh");
        var modal_gia = document.querySelector("#modal_gia");
        var modal_DRC = document.querySelector("#modal_DRC");
        var modal_weight = document.querySelector("#modal_weight");
        var modal_Engine = document.querySelector("#modal_Engine");
        var modal_HorsePower = document.querySelector("#modal_HorsePower");
        var modal_MaxCapacity = document.querySelector("#modal_MaxCapacity");
        var modal_MaxTorque = document.querySelector("#modal_MaxTorque");
        var modal_Acceleration = document.querySelector("#modal_Acceleration");
        var modal_MaxSpeed = document.querySelector("#modal_MaxSpeed");
        var modal_TypeOfFuel = document.querySelector("#modal_TypeOfFuel");
        var modal_city = document.querySelector("#modal_city");
        var modal_local = document.querySelector("#modal_local");
        var modal_combine = document.querySelector("#modal_combine");

        function Xem(prod_id) {
            var id_session = sessionStorage.id = prod_id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('carInfor.post') }}",
                method: "POST",
                data: {
                    prod_id: prod_id,
                },
                success: function(response) {
                    var carDetail = JSON.parse(response);

                    modal_Engine.innerHTML = `<p> ${carDetail[0].prod_Engine} </p>`;
                    modal_HorsePower.innerHTML = `<p> ${carDetail[0].prod_HorsePower} </p>`;
                    modal_MaxCapacity.innerHTML = `<p> ${carDetail[0].prod_MaxCapacity} </p>`;
                    modal_MaxTorque.innerHTML = `<p> ${carDetail[0].prod_MaxTorque} </p>`;
                    modal_Acceleration.innerHTML = `<p> ${carDetail[0].prod_Acceleration} </p>`;
                    modal_MaxSpeed.innerHTML = `<p> ${carDetail[0].prod_MaxSpeed} </p>`;
                    modal_TypeOfFuel.innerHTML = `<p> ${carDetail[0].prod_TypeOfFuel} </p>`;
                    modal_city.innerHTML = `<p> ${carDetail[0].prod_City} </p>`;
                    modal_local.innerHTML = `<p> ${carDetail[0].prod_Local} </p>`;
                    modal_combine.innerHTML = `<p> ${carDetail[0].prod_Combine} </p>`;
                }
            })

        }

        function Update(prod_id) {
            var id_session = sessionStorage.id = prod_id;
            var modal_Engine = document.querySelector("#modal_Engine--update");
            var modal_HorsePower = document.querySelector("#modal_HorsePower--update");
            var modal_MaxCapacity = document.querySelector("#modal_MaxCapacity--update");
            var modal_MaxTorque = document.querySelector("#modal_MaxTorque--update");
            var modal_Acceleration = document.querySelector("#modal_Acceleration--update");
            var modal_MaxSpeed = document.querySelector("#modal_MaxSpeed--update");
            var modal_TypeOfFuel = document.querySelector("#modal_TypeOfFuel--update");
            var modal_city = document.querySelector("#modal_city--update");
            var modal_local = document.querySelector("#modal_local--update");
            var modal_combine = document.querySelector("#modal_combine--update");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('carInfor.post') }}",
                method: "POST",
                data: {
                    prod_id: prod_id,
                },
                success: function(response) {
                    var carDetail = JSON.parse(response);
                    console.log(carDetail[0]);
                    modal_name.innerHTML =
                        `<input id = "update_name" value ="${carDetail[0].prod_name}" class = "form-control" >`;
                    modal_anh.innerHTML =
                        `<img style="width: 50%;" src="/Car/public/image/01_Home_01/${carDetail[0].prod_img}"
                                                        alt="">`;
                    modal_gia.innerHTML =
                        `<input id = "update_piece" value ="${carDetail[0].prod_cost}" class = "form-control" >`;
                    modal_DRC.innerHTML =
                        `<input id = "update_DRC" value ="${carDetail[0].prod_DRC}" class = "form-control" >`;
                    modal_weight.innerHTML =
                        `<input id = "update_weight" value ="${carDetail[0].prod_Weight}" class = "form-control" >`;
                    modal_Engine.innerHTML =
                        `<input id = "update_engine" value ="${carDetail[0].prod_Engine}" class = "form-control" >`;
                    modal_HorsePower.innerHTML =
                        `<input id = "update_HorsePower" value="${carDetail[0].prod_HorsePower}" class = "form-control" >`;
                    modal_MaxCapacity.innerHTML =
                        `<input id = "update_MaxCapacity" value="${carDetail[0].prod_MaxCapacity}" class = "form-control" >`;
                    modal_MaxTorque.innerHTML =
                        `<input id = "update_MaxTorque" value="${carDetail[0].prod_MaxTorque}" class = "form-control" >`;
                    modal_Acceleration.innerHTML =
                        `<input id = "update_Acceleration" value="${carDetail[0].prod_Acceleration}" class = "form-control" >`;
                    modal_MaxSpeed.innerHTML =
                        `<input id = "update_MaxSpeed" value="${carDetail[0].prod_MaxSpeed}" class = "form-control" >`;
                    modal_TypeOfFuel.innerHTML =
                        `<input id = "update_TypeOfFuel" value="${carDetail[0].prod_TypeOfFuel}" class = "form-control" >`;
                    modal_city.innerHTML =
                        `<input id = "update_city" value="${carDetail[0].prod_City}" class = "form-control" >`;
                    modal_local.innerHTML =
                        `<input id = "update_local" value="${carDetail[0].prod_Local}" class = "form-control" >`;
                    modal_combine.innerHTML =
                        `<input id = "update_combine" value="${carDetail[0].prod_Combine}" class = "form-control" >`;
                }
            })

        }

        function Modal_Update(id) {
            var update_name = document.querySelector("#update_name").value;
            var update_gia = document.querySelector("#update_piece").value;
            var update_DRC = document.querySelector("#update_DRC").value;
            var update_weight = document.querySelector("#update_weight").value;
            var update_Engine = document.querySelector("#update_engine").value;
            var update_HorsePower = document.querySelector("#update_HorsePower").value;
            var update_MaxCapacity = document.querySelector("#update_MaxCapacity").value;
            var update_MaxTorque = document.querySelector("#update_MaxTorque").value;
            var update_Acceleration = document.querySelector("#update_Acceleration").value;
            var update_MaxSpeed = document.querySelector("#update_MaxSpeed").value;
            var update_TypeOfFuel = document.querySelector("#update_TypeOfFuel").value;
            var update_city = document.querySelector("#update_city").value;
            var update_local = document.querySelector("#update_local").value;
            var update_combine = document.querySelector("#update_combine").value;

            alertify.confirm('Update sản phẩm', 'Bạn có chắc chắn muốn update sản phẩm?',
                function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('carUpdate.post') }}",
                        method: "POST",
                        data: {
                            id: id,
                            update_name: update_name,
                            update_gia: update_gia,
                            update_DRC: update_DRC,
                            update_weight: update_weight,
                            update_Engine: update_Engine,
                            update_HorsePower: update_HorsePower,
                            update_MaxCapacity: update_MaxCapacity,
                            update_MaxTorque: update_MaxTorque,
                            update_Acceleration: update_Acceleration,
                            update_MaxSpeed: update_MaxSpeed,
                            update_TypeOfFuel: update_TypeOfFuel,
                            update_city: update_city,
                            update_local: update_local,
                            update_combine: update_combine,
                        },
                        success: function(response) {

                            if (response == "success") {
                                alertify.success('Update thành công');
                                setTimeout(reloal, 1000);

                                function reloal() {
                                    location.reload();
                                }
                            } else {
                                alertify.error('Update không thành công')
                            }
                        }
                    })
                },
                function() {
                    alertify.error('Xóa không thành công')
                });

        }

    </script>

</body>

</html>
