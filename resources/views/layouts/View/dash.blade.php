@extends('layouts.Homepage')
@section('dashboard')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<div id="cover">
    <img src="g.jpeg" id="coverimage">
</div>
<div class="container">
    <div class="row">
        {{--<div class="col-md-2"></div>--}}
        <div class="col-md-12">
            <h1 class="text-center">Cars In Stock</h1>

                <table  id="myTable" class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>Car Name</th>
                            <th>Car Chasis Number</th>
                            <th>Car Model</th>
                            <th>Purchased Price</th>
                            <th>Manufacture Year</th>
                            <th>Grade</th>
                            <th>Auction House</th>
                            <th>WorkShop</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>

                        <tbody>
                        @foreach($myCar as $myCar)
                        <tr>
                            <td>{{$myCar->name}}</td>
                            <td>{{$myCar->chasis}}</td>
                            <td>{{$myCar->model}}</td>
                            <td>{{$myCar->purchasingprice}}</td>
                            <td>{{$myCar->manuFactureyear}}</td>
                            <td>{{$myCar->grade}}</td>
                            <td>@if(isset($myCar->auctiohouse)){{$myCar->auctiohouse}}@else - @endif</td>
                            <td>@if(isset($myCar->workshopname)){{$myCar->workshopname}}@else - @endif</td>
                            <td>
                                <button class="btn btn-danger"  id="deleteButton" data-items="{{$myCar->id}}">Delete</button>
                            </td>
                            <td>
                                <a class="btn btn-dark" href="{{route('cars.show',$myCar->id)}}" id="updateButton" >Update</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                </table>

        </div>
    </div>
</div>
    <script>
        window.onload = function () {
            $('button').click(function(){

                var tableRow = $(this).closest('tr');
                var datas = $(this).data('items');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'DELETE',
                    url:'cars/'+datas,
                    success:function (data) {
                        tableRow.fadeOut().remove();
                    },
                    error:function () {
                        tableRow.fadeOut().remove();
                    }
                });
            });
        };
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    @endsection