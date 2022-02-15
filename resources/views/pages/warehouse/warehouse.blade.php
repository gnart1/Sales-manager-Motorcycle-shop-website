@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')

<div class="content">
  <a class="link" href="{{ url('/warehouse/create-warehouse') }}">Thêm kho</a><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">WareHouse</h4>
            <p class="card-category"> Here is a warehouse Honda</p>
          </div>
          <div class="card-body">
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
                    Address
                  </th>
                  <th>
                    Action
                  </th>
                
                </thead>
                <tbody>
                  @foreach ($warehouses as $warehouse)
                  <tr>

                        <td>{{ $warehouse->id }}</td>
                        <td>{{ $warehouse->name }}</td>
                        <td>{{ $warehouse->address }}</td>
                        <td>
                          <a class="btn btn-primary active" href={{ url('/warehouse/edit-warehouse/'.$warehouse->id)}}>Sửa</a>
                        
                          <a class="btn btn-danger active" href={{ url('/warehouse/delete-warehouse/'.$warehouse->id)}}>Xóa</a>
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
@endsection