@extends('layouts.Homepage')

@section('fornewcar')
    <form action="{{route('set.sold')}}" method="POST">
        @csrf
        {{method_field('POST')}}
        <h3 class="fontWendy text-center text-capitalize">Ino-rder To Change Status You Must Input The Sale Price and Other Expenses</h3>
        <input type="hidden" name="carid" value="{{$myCar->id}}">
        <h4 class="text-center fontSherifPro text-primary">Car :{{$myCar->name}} Chasis:{{$myCar->chasis}}</h4>
        <div class="form-row">
            <div class="form-group col-md-6 col-10">
                <input type="number" step="0.01" name="sellingprice" class="form-control" id="sellingprice" placeholder="Enter Selling Price" required>
            </div>
            <div class="form-group col-md-6 col-10">
                <input type="submit" class="form-control btn btn-danger" id="button" value="Click To Mark This Car Sold" disabled="true">
            </div>

        </div>
    </form>
    <script>
        window.onload = function () {
            var textField = document.getElementById('sellingprice');
            textField.onblur = function () {
                if(!(textField.value == ""))
                    document.getElementById('button').disabled = false;
                else
                    document.getElementById('button').disabled = true;
            }
        }
    </script>
    @endsection