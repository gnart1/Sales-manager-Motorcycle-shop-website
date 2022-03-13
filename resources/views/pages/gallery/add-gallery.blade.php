@extends('layouts.app', ['activePage' => 'supplier', 'titlePage' => __('Table List')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Gallery</h4>
            <p class="card-category"> Here is a gallery Honda</p>
          </div>
          <div class="card-body">
            {{-- <a class="link" href="{{ url('/supplier/create-supplier') }}">Thêm nhà cung cấp </a><br> --}}
            <div class="table-responsive">
                <input type="hidden"  value="{{ $idpro }}" name="idpro" class="idpro">
                <form>
                    @csrf
                <div id="gallery_load">

                </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
      load_gallery();

      function load_gallery(){
          var idpro = $('.idpro').val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{url('/select-gallery')}}",
            methoh:"POST",
            data:{idpro:idpro,_token:_token},
            success:function(data){
              $('#gallery_load').html(data);
            }
          });
      }
  });
</script>
@endsection


