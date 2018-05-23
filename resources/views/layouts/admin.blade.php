<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
 
    <title>@yield('title', config('app.name'))</title>
</head>
 
<body>
 
<!-- Begin page content -->
<div>
    <div id="app">
        <app></app>
    </div>
</div>
 

@yield('additional.css')
 

 
@if (config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
@endif
 
@yield('additional.js')
</body>
</html>