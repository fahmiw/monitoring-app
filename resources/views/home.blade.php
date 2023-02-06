@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <ul class="list-group">
                <div class="list-group">
                @if (Auth::user()->role == 2)
                    <a class="list-group-item list-group-item-action" href="{{ URL::to('user/all/role/1')}}">Data Siswa</a>
                    <a class="list-group-item list-group-item-action" href="{{ URL::to('nilai/siswa/all')}}">Data Nilai</a>
                @else
                    <a class="list-group-item list-group-item-action" href="{{ URL::to('user/all/role/1')}}">Data Siswa</a>
                    <a class="list-group-item list-group-item-action" href="{{ URL::to('user/all/role/2')}}">Data Guru</a>                    
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
