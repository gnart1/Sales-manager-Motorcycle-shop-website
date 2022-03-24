@extends('layouts.app', ['activePage' => 'productdetail', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Gallery</h4>
                            <p class="card-category"> Here is a gallery</p>
                        </div>
                        <div class="card-body">
                            <a class="link" href="{{ url('productdetail/add-gallery/'.$id) }}">Thêm ảnh</a><br>
                            <div class="table-responsive">
                                @foreach ($productdetails[0]->image as $item)
                                <Img src="{{ asset('/assets/images/' . $item->image) }}" width="250px" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
