@extends('layouts.Homepage')
@section('fornewcar')

    <table class="table table-primary table-responsive table-responsive-sm">
        <tbody>
        <tr>
        <th>Car Name</th>
            <th>Car Chasis Number</th>
            <th>Car Model</th>
            <th>Add Spare Parts</th>
            <th>Update Status(Sold)</th>
            <th>Add WorkShop and Workshop Expenses</th>
        </tr>
        </tbody>
        <tbody>
                @foreach($myCar as $car)
                    <tr>
                        <td>{{$car->name}}</td>
                        <td>{{$car->chasis}}</td>
                        <td>{{$car->model}}</td>
                        <td><a href="{{route('spare_part.show',$car->id)}}" class="btn btn-primary">Add Spare Parts</a></td>
                        <td><a href="update_status/{{$car->id}}" class="btn btn-dark">Status</a></td>
                        <td><a href="{{route('form.update.workshop',$car->id)}}" class="btn btn-danger">Add WorkShop and Workshop Expenses</a></td>
                    </tr>
                    @endforeach
        </tbody>
    </table>




    @endsection