<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý lịch lái thử</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/Car/resources/css/index.css">
</head>

<body>
    @include('header')
    <div class="container">
        <div class="title" style="padding: 3rem 0rem;">
            <h3 style="border-bottom: 2px solid #ec2c73; width: fit-content; color: #ec2c73;">Thông tin lịch lái thử
            </h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Xe</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Trạng thái </th>
                    <th scope="col">Ngày đặt lịch</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user_schedule as $item)
                    <tr>
                        <th>{{ $loop->index }}</th>
                        <td>{{ $item->customer }}</td>
                        <td>{{ $item->prod_name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->SDT }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->appointmentSchedule }}</td>
                    </tr>

                @endforeach

            </tbody>

        </table>
        @empty($user_schedule)
            <p class="text-center">Không có lịch lái thử nào!!</p>
        @endisset
    </div>


    <!-- Thư viện hỗ trợ -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Thư viện bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
