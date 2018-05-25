@extends('layouts.frontend')

@section('title')
    {{ config('app.title', 'Example') }}
@endsection

@section('content')
    <div>
        @foreach ($brands as $brand)
            {{$brand['brand']}}

        @endforeach
    </div>
@endsection
