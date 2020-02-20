@extends('layouts.app')

@section('content')
<div class="container">
    <menue-container :menues="{{ json_encode($menues) }}" :resturant-id="{{ $resturant_id }}"></menue-container>
</div>
@endsection