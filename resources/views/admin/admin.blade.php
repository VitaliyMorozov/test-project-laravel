@extends('layouts.admin')

@section('title')
    {{ config('app.title', 'Example') }}
@endsection

@section('content')
    <div id="logout"></div>
    <div id="app">
        <v-app>
            <v-content>
                <v-container>
                    <router-view></router-view>
                </v-container>
            </v-content>
        </v-app>
    </div>
@endsection







