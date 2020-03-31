<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('control')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{asset('control')}}/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('control')}}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('control')}}/dist/css/fontsgoogleapis.css" rel="stylesheet">
    <!--include DataTable  -->
    <link rel="stylesheet" type="text/css" href="{{asset('control')}}/DataTables/datatables.min.css" />
    <!-- end of include DataTable -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @yield('css')
</head>
