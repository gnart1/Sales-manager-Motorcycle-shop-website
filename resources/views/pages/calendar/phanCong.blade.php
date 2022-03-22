@extends('layouts.app', ['activePage' => 'calendar', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Phân công</h4>
                            <p class="card-category"> Create here</p>
                        </div>
                        <div style="margin-top: 20px;padding: 30px">
                            <form action="{{ url('calendar/update/'.$id) }}" name="myForm" method="POST">
                                @csrf
                                <div class="form-group" id="Customer">
                                    <label style="color: black;">Chọn nhân viên</label>
                                    <input name="idAdmin" type="text" class="form-control"
                                        id="phoneNumber" aria-describedby="emailHelp" 
                                        onclick="myFunction()"
                                        placeholder="Tên khách hàng ..." autocomplete="off">
                                        <div class="dropdown">
                                            <div id="myDropdown" class="dropdown-content">
                                                <input type="text" placeholder="Search.." id="myInput"
                                                    onkeyup="filterFunction()" autocomplete="off">
                                                @forelse ($admin as $itemType)
                                                <a id='{{ $itemType->phone }}' style="cursor: pointer;" onclick="choose({{ $itemType->id }})">{{ $itemType->name }}</a>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
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
<style>
    #myInput {
        box-sizing: border-box;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }

</style>
<script>
    // $('#type').click(function() {
    //     if($('#type').val() == 0){
    //         $('#Customer').hide();
    //     }else{
    //         $('#Customer').show();
    //     }
        
    // })
    function myFunction() {
        // document.getElementById("myDropdown").classList.toggle("show");
        $('#myDropdown').show();
    }
    function choose(phone) {
        $('#myDropdown').hide();
        $('#phoneNumber').val(phone);
        
    }
    window.addEventListener('click',function(e) {
        if(e.target.id !==  'myInput' && e.target.id !=='phoneNumber'){
          $('#myDropdown').hide();
        }
    });
    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div
            = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i <
            a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>