@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Typography')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Product</h4>
        <p class="card-category">Here is a product</p>
      </div>
      <div class="card-body">
        <a class="link" href="{{ url('/product/create-product') }}">Thêm sản phẩm</a><br>
        <div class="table-responsive">
          <table id="myTableProduct" class="table">
            <thead class=" text-primary">
              <th>
                ID
              </th>
              <th>
                Name
              </th>
              <th>
                Description
              </th>
              <th>
                Type
              </th>
              <th>
                Action
              </th>
            
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>

                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->type == 1 ? "Xe" : "Phụ tùng/Phụ kiện" }}</td>
                    <td>
                      <a class="btn btn-primary active" href={{ url('/product/edit-product/'.$product->id)}}>Sửa</a>
                    
                      <a class="btn btn-danger active" href={{ url('/product/delete-product/'.$product->id)}}>Xóa</a>
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
<script>
  $(document).ready( function () {
    $('#myTableProduct').DataTable();
} );
</script>
@endsection