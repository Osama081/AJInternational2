@extends('layouts.Homepage')
@section('fornewcar')

    <form action="{{route('update.workshop')}}" method="post">
        @csrf
        {{method_field('POST')}}
        <input type="hidden" value="{{$myCar->id}}" name="car">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Enter WorkShop Name" name="workshopname" required>
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" placeholder="Enter Expenses" name="workshopexpense" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" >
    </form>
    @endsection