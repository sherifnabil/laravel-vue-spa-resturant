@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Orders For Resturant {{ $resto->name }}</h2>
        </div><br>
    </div>
    <div class="row">
            <div class="col-md-12">
                <a href="{{ route('resto.orders.add', $resto->id) }}" class="btn btn-primary float-right">Add Order</a><br><br>
                @if ($orders->count() > 0)
                    <manage-orderes :orderes="{{ json_encode($orders) }}"></manage-orderes>
                    {{ $orders->render() }}
                @else
                    No Orders Yet!
                @endif
        </div>
    </div>
</div>
@endsection