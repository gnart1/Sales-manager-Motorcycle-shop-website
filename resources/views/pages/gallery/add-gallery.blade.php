@extends('layouts.app', ['activePage' => 'productdetail', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Thêm ảnh</h4>
                            <p class="card-category">Here is a gallery</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('productdetail/add-gallery/'.$id) }}" name="myForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label style="color: black;">Image</label>
                                    <input required type="file" class="form-control" name="images[]"  multiple>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
