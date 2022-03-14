@extends('layouts.app', ['activePage' => 'productdetail', 'titlePage' => __('Icons')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Product Detail</h4>
                    <p class="card-category">Here is a product detail</p>
                </div>
                <div class="card-body">
                    <a class="link" href="{{ url('/productdetail/create-product-detail') }}">Thêm sản phẩm chi
                        tiết</a><br>
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
                                    Image
                                </th>
                                <th>
                                  Thư viện ảnh
                              </th>
                              <th>
                                Color
                            </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    model
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Warehouse
                                </th>
                                <th>
                                    Supplier
                                </th>
                                {{-- <th>
                Action
              </th> --}}

                            </thead>
                            <tbody>
                                @foreach ($productdetails as $productdetail)
                                    <tr>

                                        <td>{{ $productdetail->id }}</td>
                                        <td>{{ $productdetail->nameProduct }}</td>
                                        <td>
                                            @forelse ($productdetail->image  as $itemImg)
                                                <Img src="{{ asset('/assets/images/' . $itemImg->image) }}" width="100px" />
                                            @empty
                                            @endforelse
                                        </td>
                                        <td><a href="{{ url('/gallery/add-gallery/' . $productdetail->idProduct) }}">Thêm
                                                thư viện ảnh</a></td>

                                        <td>{{ $productdetail->color }}</td>
                                        <td>{{ $productdetail->type == 1 ? 'Xe' : 'Phụ tùng/Phụ kiện' }}</td>
                                        <td>{{ $productdetail->price }}</td>
                                        <td>{{ $productdetail->model }}</td>
                                        <td>{{ $productdetail->quantity }}</td>
                                        <td>{{ $productdetail->nameWareHouse }}</td>
                                        <td>{{ $productdetail->nameSupplier }}</td>

                                        {{-- <td>
                      <a class="btn btn-primary active" href={{ url('/product/edit-product/'.$product->id)}}>Sửa</a>
                    
                      <a class="btn btn-danger active" href={{ url('/product/delete-product/'.$product->id)}}>Xóa</a>
                    </td> --}}

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
