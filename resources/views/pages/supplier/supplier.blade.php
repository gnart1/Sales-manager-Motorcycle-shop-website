@extends('layouts.app', ['activePage' => 'supplier', 'titlePage' => __('Table List')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Supplier</h4>
            <p class="card-category"> Here is a warehouse Honda</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
          @endif
            <a class="link" href="{{ url('/supplier/create-supplier') }}">Thêm nhà cung cấp </a><br>
            <div class="table-responsive">
              <table id="myTableSupplier" class="table">
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
                    Email
                  </th>
                  <th>
                    Action
                  </th>
                
                </thead>
                <tbody>
                  @foreach ($suppliers as $supplier)
                  <tr>

                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>
                          <a class="btn btn-primary active" href={{ url('/supplier/edit-supplier/'.$supplier->id)}}>Sửa</a>
                        
                          <a class="btn btn-danger active" href={{ url('/supplier/delete-supplier/'.$supplier->id)}}>Xóa</a>
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
  $(document).ready( function () {
    $('#myTableSupplier').DataTable();
} );
</script>
@endsection