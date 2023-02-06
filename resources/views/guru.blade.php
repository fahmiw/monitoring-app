@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Guru Table</div>

                <div class="panel-body">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> id</th>
                            <th scope="col"> name</th>
                            <th scope="col"> email </th>
                            <th scope="col"> mata pelajaran</th>
                            <th scope="col"> umur </th>
                            <th scope="col"> jenis kelamin </th>
                            <th scope="col"> action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($gurus) >= 1)
                        @foreach($gurus as $guru)
                            <tr scope="row">
                                <td> {{$guru->id}} </td>
                                <td> {{$guru->name}} </td>
                                <td> {{$guru->email}} </td>
                                <td> {{$guru->guru->mata_pelajaran}} </td>
                                <td> {{$guru->guru->umur}} </td>
                                @if($guru->guru->jenis_kelamin === 0)
                                <td> Laki-laki </td>
                                @elseif($guru->guru->jenis_kelamin === 1)
                                <td> Perempuan </td>
                                @else
                                <td>  </td>
                                @endif
                                <td> <a class="btn btn-primary" href="{{route('user.edit',$guru->id)}}">Edit</a></td>
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