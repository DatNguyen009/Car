<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN</title>
    <link rel="stylesheet" href="/Car/resources/css/style.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
</head>

<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
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
                    <a class="dropdown-item" href="{{ url('Admin/logout') }}">Logout</a>
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

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Lịch đặt lái thử</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số lịch lái thử đã đặt
                                    <p>{{ $count_schedule }} </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Tổng lịch lái thử chưa hoàn thành
                                    <p>{{ $count_slackingSchedule }} </p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/Car/public/Admin/Manager">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Tổng lịch lái thử hoàn thành
                                    <p>{{ $count_completeSchedule }} </p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/Car/public/Admin/ScheduleComplete">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Tổng lịch lái thử bị hủy
                                    <p>{{ $count_cancel }} </p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/Car/public/Admin/ScheduleCancel">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="xem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr class="text-center" style="font-size: 14px;width: max-content;">
                                                        <th>Tên xe</th>
                                                        <th>Ảnh</th>
                                                        <th>Giá</th>
                                                        {{-- <th>Màu</th>
                                                        --}}
                                                        {{-- <th>Số lượng</th>
                                                        --}}

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr class="text-center" style="font-size: 13px;">
                                                        <td id="modal_name">

                                                        </td>
                                                        <td id="modal_anh" style="max-width:140px">

                                                        </td>
                                                        <td id="modal_gia" style="max-width:140px;">

                                                        </td>
                                                        {{-- <td id="modal_mau">

                                                        </td>
                                                        <td id="modal_soluong">

                                                        </td> --}}

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



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Lịch đặt lái thử
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>STT</th>
                                            <th>Tên khách</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Ngày đặt lịch</th>
                                            <th>Trạng thái</th>
                                            <th style="min-width: 169px;">Cập nhật</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($schedule as $item)
                                            <tr style="font-size: 12px;">

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->customer }} </td>
                                                <td style="max-width:140px;">{{ $item->address }} </td>
                                                <td>{{ $item->email }} </td>
                                                <td>{{ $item->SDT }} </td>
                                                <td>{{ $item->appointmentSchedule }} </td>
                                                <td>{{ $item->status }} </td>
                                                <td><button type="button" style="font-size: 10px;" class="btn btn-info"
                                                        onclick="Watch_Detail('{{ $item->prod_id }} ', '{{ $item->email }} ')"
                                                        data-toggle="modal" data-target="#xem">Xem</button>
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination">
                                @if ($schedule->currentPage() > 1 && $schedule->lastPage() > 1)
                                    <a class="btn btn-light" href="{{ $schedule->previousPageUrl() }}">Prev</a>
                                @endif


                                @for ($i = 1; $i <= $schedule->lastPage(); $i++)
                                    <!-- a Tag for another page -->
                                    @if ($i == $schedule->currentPage())
                                        <a href="{{ $schedule->url($i) }}" class="text-center active">
                                            <p style="color: #ea2d4e;">{{ $i }}</p>
                                        </a>
                                    @else
                                        <a href="{{ $schedule->url($i) }}" class="text-center">
                                            <p>{{ $i }}</p>
                                        </a>
                                    @endif

                                @endfor

                                @if ($schedule->currentPage() < $schedule->lastPage())
                                    <a class="btn btn-light" href="{{ $schedule->nextPageUrl() }}">Next</a>
                                @endif

                            </div>
                        </div>
                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            {{-- <p>Lưu ý:</p>
                            <p>Nút xem: để xem thông tin chi tiết đơn hàng</p>
                            <p>Nút giao: cập nhật đơn hàng đã giao thành công</p>
                            <p>Nút xong: cập nhật đơn hàng đã đóng gói xong</p> --}}
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
  
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="../../resources/js/tata.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        var mang = [];
        var modal_name = document.querySelector("#modal_name");
        var modal_anh = document.querySelector("#modal_anh");
        var modal_gia = document.querySelector("#modal_gia");
        var modal_soluong = document.querySelector("#modal_soluong");
        var modal_tongtien = document.querySelector("#modal_tongtien");
        var modal_mau = document.querySelector("#modal_mau");

        function Watch_Detail(id, email) {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('carinfor') }}",
                method: "POST",
                data: {
                    id: id,
                    email: email,
                },
                success: function(response) {
                    var carDetail = JSON.parse(response);
                    modal_name.innerHTML = `<p> ${carDetail[0].prod_name} </p>`
                    modal_anh.innerHTML = `<img src="/Car/public/image/${carDetail[0].prod_img} " alt="" style ="width: 100%;">`
                    modal_gia.innerHTML = `<p>  ${ new Intl.NumberFormat('de-DE', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(carDetail[0].prod_cost)} </p>`

                }
            })



        }

    </script>
    <script>
        function Conplete_Schedule(id, email, appointmentSchedule) {
            alertify.confirm("Thông báo","Bạn có chắc chắn cập nhật lịch lái thử này đã hoàn thành hay không?",
                function() {
                    const Complete_schedule = new Promise(
                            function(resolve, reject) {
                                fetch("{{ route('CompleteSchedule') }}", {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        body: JSON.stringify({
                                            id: id,
                                            email: email,
                                            appointmentSchedule: appointmentSchedule,
                                        })
                                    })

                                    .then(data => {
                                        resolve(data.text());
                                    })
                                    .catch(error => {
                                        reject(console.log(error));
                                    })
                            }
                        )
                        .then(function(data) {

                            if (data == 'success') {
                                alertify.success('Cập nhật lịch lái thử thành công');
                                setTimeout(reloal, 1000);

                                function reloal() {
                                    location.reload();
                                }
                            } else {
                                alertify.error('Cập nhật lịch lái thử thất bại');
                            }
                        })
                        .catch(error => console.log(error))
                },
                function() {
                    alertify.error('Cập nhật không thành công!!!');
                });


            // .then(response => {
            //     return response.text();
            // })
            // .then(data => {
            //         console.log(data.text());
            //     })
            //     .catch(error => console.error('Error:', error))

        }

    </script>
    <script>
        function Cancel_Schedule(id, email, appointmentSchedule) {
            alertify.confirm("Thông báo",'Bạn có chắc chắn muốn hủy lịch lái thử này hay không?',
                function() {
                    const Cancel = new Promise(
                            function(resolve, reject) {
                                fetch("{{ route('CancelSchedule') }}", {
                                        method: "POST",
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        body: JSON.stringify({
                                            id: id,
                                            email: email,
                                            appointmentSchedule: appointmentSchedule,
                                        })
                                    })
                                    .then(data => {
                                        resolve(data.text());
                                    })
                                    .catch(error => {
                                        reject(error);
                                    })
                            }
                        )
                        .then(data => {
                            if (data == 'success') {
                                alertify.success('Hủy đặt lịch lái thử thành công');
                                setTimeout(reloal, 1000);

                                function reloal() {
                                    location.reload();
                                }
                            } else {
                                alertify.error('Hủy lịch lái thử thất bại');
                            }
                        })
                        .catch(error => console.log(error))
                },
                function() {
                    alertify.error("thất bại");
                }
            );
        }

    </script>
</body>

</html>
