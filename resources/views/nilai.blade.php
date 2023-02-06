@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Nilai Siswa</div>

                <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> id</th>
                            <th scope="col"> name</th>
                            <th scope="col"> mata pelajaran </th>
                            <th scope="col"> nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($nilais) >= 1)
                        @foreach($nilais as $nilai)
                        <tr scope="row">
                            <td> {{$nilai->id}} </td>
                            <td> {{$nilai->user->name}} </td>
                            <td> {{$nilai->mata_pelajaran}} </td>
                            <td> {{$nilai->nilai}} </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td>Data not found</td></tr>
                    @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection