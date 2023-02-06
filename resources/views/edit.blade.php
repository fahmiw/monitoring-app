@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', $userData->id) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $userData->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $userData->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role" id="role">
                                    <?php
                                    $userData->role == 1 ? $role1 = "selected='selected'" : $role1 = " ";
                                    $userData->role == 2 ? $role2 = "selected='selected'" : $role2 = " ";
                                    $userData->role == 3 ? $role3 = "selected='selected'" : $role3 = " ";
                                    ?>
                                    <option value="1" {{$role1}}>Siswa</option>
                                    <option value="2" {{$role2}}>Guru</option>
                                    <option value="3" {{$role3}}>Admin</option>
                                </select>
                            </div>
                        </div>

                        @if ($userData->role == 1)
                        <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">Kelas</label>

                            <div class="col-md-6">
                                <input id="kelas" type="text" class="form-control" name="kelas" value="{{ $userData->siswa->kelas }}">

                                @if ($errors->has('kelas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @elseif ($userData->role == 2)
                        <div class="form-group{{ $errors->has('mata_pelajaran') ? ' has-error' : '' }}">
                            <label for="mata_pelajaran" class="col-md-4 control-label">Mata Pelajaran</label>

                            <div class="col-md-6">
                                <input id="mata_pelajaran" type="text" class="form-control" name="mata_pelajaran" value="{{ $userData->guru->mata_pelajaran }}">

                                @if ($errors->has('mata_pelajaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mata_pelajaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="form-group{{ $errors->has('umur') ? ' has-error' : '' }}">
                            <label for="umur" class="col-md-4 control-label">Umur</label>

                            <div class="col-md-6">
                            <?php $userData->role == 1 ? $value = $userData->siswa->umur : $value = $userData->guru->umur
                            ?>
                                <input id="umur" type="text" class="form-control" name="umur" value="{{$value}}">

                                @if ($errors->has('umur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('umur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    @if($userData->role == 1)
                                    <option value="0" <?php $userData->siswa->jenis_kelamin == 0 ? "selected='selected'" : " "?> >Laki-laki</option>
                                    <option value="1" <?php $userData->siswa->jenis_kelamin == 1 ? "selected='selected'" : " "?> >Perempuan</option>
                                    @elseif($userData->role == 2)
                                    <option value="0" <?php $userData->guru->jenis_kelamin == 0 ? "selected='selected'" : " "?> >Laki-laki</option>
                                    <option value="1" <?php $userData->guru->jenis_kelamin == 1 ? "selected='selected'" : " "?> >Perempuan</option>
                                    @endif
                                </select>

                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
