@extends('layouts.Homepage')
@section('fornewcar')
    <form action="{{route('rep')}}">
    <div class="form-row">
        <div class="form-group col-md-6">
            <input placeholder="Enter Start Date" type="text" class="form-control" id="startDate" name="startDate">
        </div>
        <div class="form-group col-md-6">
            <input type="submit" value="Submit" class="btn btn-primary">
    </div>

    </div>
    </form>
    @if(isset($myCar))
    <div class="container container-fluid" @if(!isset($myCar)) hidden="true" @endif>
        <table class="table table-info">
            <tbody>
                <tr>
                    <th>Car Name</th>
                    <th>Car Chasis Number</th>
                    <th>Car SpareParts Expenses</th>
                    <th>Car Workshop Expenses</th>
                    <th>Car Transportation Expenses</th>
                    <th>Car Purchased Price</th>
                    <th>Total Expenses</th>
                    <th>Selling Price</th>
                    <th>Profit</th>
                </tr>
            </tbody>
            @foreach($myCar as $car)
                    <tr>
                        <td>{{$car->name}}</td>
                        <td>{{$car->chasis}}</td>
                        <td>{{DB::table('spare_parts')->where('car','=',$car->id)->sum('price')}}</td>
                        <td>{{$car->workshopexpense}}</td>
                        <td>{{$car->expense}}</td>
                        <td>{{$car->purchasingprice}}</td>
                        <td>{{DB::table('spare_parts')->where('car','=',$car->id)->sum('price')+$car->workshopexpense+$car->expense}}
                        <td>{{$car->sellingprice}}</td>
                        <td>{{$car->sellingprice-(DB::table('spare_parts')->where('car','=',$car->id)->sum('price')+$car->workshopexpense+$car->expense+$car->purchasingprice)}}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    @endif
    <script>
        $( function() {
            $( "#startDate" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
            $( "#endDate" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        } );
    </script>
    @endsection

