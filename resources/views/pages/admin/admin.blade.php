@extends('layouts.app', ['activePage' => 'admin', 'titlePage' => __('Icons')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Admin</h4>
        <p class="card-category">Here is a admin</p>
      </div>
      <div class="card-body">
        <a class="link" href="{{ url('/admin/create-admin') }}">Thêm admin</a><br>
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                Phone
              </th>
              <th>
                Address
              </th>
              <th>
                Email
              </th>
              <th>
                Position
              </th>
              <th>
                Role
              </th>
              
              <th>
                Action
              </th>
            
            </thead>
            <tbody>
              @foreach ($admins as $admin)
              <tr>

                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td>{{ $admin->address }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                    <?php
                      if($admin->position == 0)
                      {
                      echo "CEO";
                      }
                      else if ($admin->position == 1)
                      {
                        echo 'Nhân viên bảo dưỡng';
                      }else
                      {
                        echo 'Nhân viên tư vấn';
                      }
                      ?></td>
                    <td>{{ $admin->role  == 0 ? 'admin' : 'superAdmin' }}</td>
                    <td>
                      <a class="btn btn-primary active" href={{ url('/admin/edit-admin/'.$admin->id)}}>Sửa</a>
                    
                      <a class="btn btn-danger active" href={{ url('/admin/delete-admin/'.$admin->id)}}>Xóa</a>
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
@endsection