<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Que hacer en Tabasco</title>
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
	
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
	<div id="app"></div>
  	<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>