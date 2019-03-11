@extends('layouts.frontend')

@section('title')
    {{ config('app.title', 'Example') }}
@endsection

@section('content')
    <div id="app" data-app="true" class="application theme--light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <router-view name="brandsIndex"></router-view>
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
