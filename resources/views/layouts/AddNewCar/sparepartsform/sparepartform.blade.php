@extends('layouts.Homepage')
@section('fornewcar')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <h4 class="text-center"><span class="fontWendy">Enter The Spare Part and Price For Car with Chasis Number{{$car->chasis}}</span></h4>
    <div class="row">
        <div class="col-md-6">
    @if(isset($myCar))
    <table class="" id="myTable">
        <tbody>
        <tr>
            <th>Spare Parts</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($myCar as $cars)
                <tr>
                    <td>{{$cars->spareparts}}</td>
                    <td>{{$cars->price}}</td>
                    <td><button onclick="submit()" class="btn btn-danger" id="{{$cars->id}}">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
    <script>

    </script>
    @endif

        </div>
        <div class="col-md-6">
    <form action="{{route('spare_part.store')}}" method="post">
        @csrf
        {{method_field('POST')}}
        <div id="spareForm"></div>
        <input type="hidden" name="car"  id="car" value="{{$car->id}}">
        <div class="form-row">
        <div class="form-group col-md-4">
        <input type="text"  name="spareparts[]" id="spareparts" class="form-control" placeholder="Enter The Spare Parts" required>
        </div>
            <div class="form-group col-md-4">
                <input type="number" step=".01" id="price" name="price[]" class="form-control" placeholder="Enter Price" required>
            </div>
            <div class="form-group col-md-4">
                <input type="text"  name="company[]" id="company" class="form-control" placeholder="Enter Company" required>
            </div>

        </div>
        <input type="submit"  class="btn btn-primary"  value="Done Adding Parts">
    </form>
    <br>
    <button id="myButton" class="btn btn-dark"> Click to add spare parts</button>
    </div>

    </div>
    <script>
        window.onload = function () {

            var myDoc = document.getElementById('spareForm');
            document.getElementById('myButton').onclick = function () {
               $("#spareForm").append('<div class="form-row"><div class="form-group col-md-4"><input type="text"  name="spareparts[]" ' +
                   'class="form-control" placeholder="Enter The Spare Parts"></div>'+
                    '<div class="form-group col-md-4">' +
                   '<input type="number" step=".01" name="price[]" class="form-control" placeholder="Enter Price">' +
                   '</div> <div class="form-group col-md-4">' +
                   '<input type="text"  name="company[]" class="form-control" placeholder="Enter Company">' +
                   '</div></div>'
               );
            }
        }

     function submit(){
            $('button').click(function (s) {

                s.stopPropagation();
                var tableRow = $(this).closest('tr');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'DELETE',
                    url:'/spare_part/'+$(this).attr('id'),
                    success:function (data) {
                        tableRow.fadeOut().remote();
                    },
                    error:function () {
                        alert('Sorry Rajja Ji');
                    }
                });
            });
     }
        // function addFeature(){
        //
        //     alert('here');
        //         this.stopPropagation();
        //
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             type:'POST',
        //             url:'spare_part/',
        //             data:{
        //                 car:$('#name').val(),
        //                 spareparts:$('#spareparts').val(),
        //                 company:$('#company').val(),
        //                 price:$('#price').val()
        //             },
        //             success:function (data) {
        //                 alert(' Rajja Ji');
        //             },
        //             error:function () {
        //                 alert('Sorry Rajja Ji');
        //             }
        //         });
        //
        // }
    </script>
    @endsection