@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <resto-group :restos="{{ json_encode($restos) }}" >
            </resto-group>
        </div>
    </div>
</div>
<div class="container">
    <menue-container :menues="{{ json_encode($menues) }}" :resturant-id="{{ $resturant_id }}" >
    </menue-container>
</div>
@endsection
