@extends('layouts.app', ['activePage' => 'calendar', 'titlePage' => __('Icons')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Phân công</h4>
                    <p class="card-category">Here is a Phân công</p>
                </div>
                <div class="card-body">
                    {{-- <a class="link" href="{{ url('/customer/create-customer') }}">Thêm khách hàng</a><br> --}}
                    <div class="table-responsive">
                        <table id="myTableCalendar" class="table">
                            <thead class=" text-primary">

                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Lịch hẹn
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Xe
                                </th>
                                <th>
                                    type
                                </th>
                                <th>
                                    Phân công
                                </th>
                                <th>
                                   Admin Phân công
                                </th>
                                <th>
                                    Action
                                </th>

                            </thead>
                            <tbody>
                                @foreach ($calendar as $cal)
                                    <tr style="height: 8vh">
                                        <td>{{ $cal->nameCustomer }}</td>
                                        <td>{{ $cal->phoneCustomer }}</td>
                                        <td>{{ $cal->email }}</td>
                                        <td>{{ $cal->calendar }}</td>
                                        <td>{{ $cal->address }}</td>
                                        <td>{{ $cal->nameProduct ?? null }}</td>
                                        <td>{{ $cal->type == 0 ? 'Mua xe' : 'Bảo dưỡng' }}</td>
                                        <td>{{ $cal->nameAdmin ?? null }}</td>
                                        <td>
                                            {{ $cal->admin_assignment ?? null }}
                                        </td>
                                        <td>
                                            <?php
                                            if ($cal->status == 1 && $cal->nameAdmin ?? null != null) {
                                                echo "<div class=''>Đã xong</div>";
                                            } elseif ($cal->nameAdmin ?? null != null && $cal->status == 0) {
                                                if (Auth::guard('admin')->user()->role != 2 || Auth::guard('admin')->user()->id == $cal->idAdmin ?? null) {
                                                    echo "<a class='btn btn-warning active btnXong' id='{$cal->id}'>Xong</a>";
                                                }
                                            } else {
                                                if (Auth::guard('admin')->user()->role != 2) {
                                                    echo "<a class='{$cal->id} {$cal->type} btn btn-primary active phancong'>Phân công</a>";
                                                }
                                            }
                                            ?>
                                            <form action="{{ url('/calendar/xong/' . $cal->id) }}" name="myForm"
                                                method="POST" hidden>
                                                @csrf
                                                <input type="text" class="inputId" name="idAdmin"
                                                    value="{{ $cal->idAdmin ?? null }}">
                                                <button class='btn btn-warning active' id="xong-{{ $cal->id }}"
                                                    type="submit">Xong</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTableCalendar').DataTable({
                columnDefs: [{
                    type: 'date',
                    'targets': [3]
                }],
                order: [
                    [3, 'desc']
                ],
            });
        });
        $('.btnXong').click(function() {

            $('#xong-' + $(this).attr('id')).click();
            console.log($(this).attr('id'));
        });
        $('.phancong').click(function() {
            var id = $(this).attr('class').split(' ')[0];
            var type = $(this).attr('class').split(' ')[1];
            window.location.href = '/calendar/phanCong/' + id + '/' + type;
        })
    </script>
@endsection
