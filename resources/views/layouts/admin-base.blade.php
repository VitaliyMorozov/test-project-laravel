<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= csrf_token() ?>">

    <title>@yield('title', config('app.name'))</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>

<body>


<!-- Begin page content -->
@yield('content.base')


@include('layouts.partials.footer')

<link media="all" type="text/css" rel="stylesheet" href="{{ mix('/assets/styles/app.css') }}">
@yield('additional.css')
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
<script src="{{ mix('/assets/js/admin.js') }}"></script>

@if (config('app.env') == 'local' && !request()->isSecure()){?>
<script src="http://localhost:35729/livereload.js"></script>
@endif

@yield('additional.js')
</body>
</html>
