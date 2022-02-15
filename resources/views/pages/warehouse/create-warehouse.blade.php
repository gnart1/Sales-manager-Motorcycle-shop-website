@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<form action="{{ url('/create-warehouse/'.$warehouse->id) }}" name="myForm"  onsubmit="return validateFormMajor()" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input  name="warehouse_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên kho ...">
    </div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
@endsection