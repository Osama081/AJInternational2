@extends('layouts.Homepage')
@section('fornewcar')
    @if(isset($myCar))
        <h2 class="fontWendy text-center">Update The Car:{{$myCar->name}} with chasis {{$myCar->chasis}}</h2>
    @endif
    <form  action="cars/{{$myCar->id}}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <select name="name" id="carSelect" class="form-control">
                <option value="Honda">Honda</option>
                <option value="Corolla">Corolla</option>
                <option value="Benz">Benz</option>
                <option value="Suzuki">Suzuki</option>
            </select>
        </div>
        {{--Two inline forms--}}
        <div class="form-row">
            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">
                <label for="chasis"> </label>
                <input type="number" class="form-control" name="chasis"  placeholder="Enter Chasis Number" @if(isset($myCar))value="{{$myCar->chasis}}"  @endif required>
            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">
                <label for="model"></label>
                <input type="number" name="model" class="form-control" @if(isset($myCar))value="{{$myCar->model}}" @endif placeholder="Enter Model" required>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">
                <label for="grade"> </label>
                <input type="number" step=".01" @if(isset($myCar))value="{{$myCar->grade}}" @endif  class="form-control" name="grade" placeholder="Enter Grade" required>
            </div>
            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">
                <label for="manuFactureyear"></label>
                <input type="number" name="manuFactureyear" @if(isset($myCar)) value="{{$myCar->manuFactureyear}}" @endif class="form-control" placeholder="Enter Manufacture Year" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">
                <label for="purchasingprice"> </label>
                <input type="number" step=".01" class="form-control" @if(isset($myCar)) value="{{$myCar->purchasingprice}}" @endif name="purchasingprice" placeholder="Enter Purchasing Price" required>
            </div>
            {{--<div class="form-group col-md-6 col-lg-6 col-sm-12 col-10">--}}
            {{--<label for="manuFactureyear"></label>--}}
            {{--<input type="number" name="manuFactureyear" class="form-control" placeholder="Enter Manufacture Year" required>--}}
            {{--</div>--}}
        </div>


        <div class="form-group">
            <fieldset>
                Auction House
                <label class="form-inline">

                    <input type="radio" @if(isset($myCar) && $myCar->auctionhouse=='yes' ) checked="checked"  @endif    class="form-control" name="auctionhouse" value="true">Yes
                </label>
                <label class="form-inline">
                    <input type="radio"  class="form-control" name="auctionhouse" value="false" @if(isset($myCar) && $myCar->auctionhouse=='no' ) checked="checked"  @endif>No
                </label>
            </fieldset>
        </div>
        <div class="form-group" id="hiddenauction">
            <label for="aunctionHouseName">Leave Empty If No Auction</label>
            <input type="text" class="form-control" @if(isset($myCar)) value="{{$myCar->aunctionHouseName}}" @endif  name="aunctionHouseName" placeholder="Enter Auction house" >
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" @if(isset($myCar)) value="{{$myCar->to}}" @endif name="to" placeholder="Transported To:">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" @if(isset($myCar)) value="{{$myCar->from}}" @endif name="from" placeholder="Transported From:">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" @if(isset($myCar)) value="{{$myCar->expense}}" @endif name="expense" placeholder="Expenses">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">@if(isset($myCar))Update @else Add New Car @endif</button>
        <button type="reset" @if(isset($myCar)) disabled="true" @endif class="btn btn-danger">Reset Fields</button>

    </form>

    <script>
    </script>
@endsection