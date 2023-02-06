@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Siswa Table</div>

                <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> id</th>
                            <th scope="col"> name</th>
                            <th scope="col"> email </th>
                            <th scope="col"> kelas</th>
                            <th scope="col"> umur </th>
                            <th scope="col"> jenis kelamin </th>
                            <th scope="col"> action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($siswas) >= 1)
                        @foreach($siswas as $siswa)
                        <tr scope="row">
                            <td> {{$siswa->id}} </td>
                            <td> {{$siswa->name}} </td>
                            <td> {{$siswa->email}} </td>
                            <td> {{$siswa->siswa->kelas}} </td>
                            <td> {{$siswa->siswa->umur}} </td>
                            @if($siswa->siswa->jenis_kelamin === 0)
                            <td> Laki-laki </td>
                            @elseif($siswa->siswa->jenis_kelamin === 1)
                            <td> Perempuan </td>
                            @else
                            <td>  </td>
                            @endif
                            
                            @if (Auth::user()->role == 2)
                            <td>
                                <a class="btn btn-success" href="{{route('add.nilai',$siswa->id)}}">Tambah Nilai</a>         
                            </td>
                            @else
                            <td>
                                <a class="btn btn-primary" href="{{route('user.edit',$siswa->id)}}">Edit</a>
                            </td>
                            @endif
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