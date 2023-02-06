@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Nilai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/nilai/submit') }}">
                        {{ csrf_field() }}

                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{$id}}">
                        
                        <div class="form-group{{ $errors->has('mata_pelajaran') ? ' has-error' : '' }}">
                            <label for="mata_pelajaran" class="col-md-4 control-label">Mata Pelajaran</label>

                            <div class="col-md-6">
                                <input id="mata_pelajaran" type="text" class="form-control" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}">

                                @if ($errors->has('mata_pelajaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mata_pelajaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}">
                            <label for="nilai" class="col-md-4 control-label">Nilai</label>

                            <div class="col-md-6">
                                <input id="nilai" type="number" class="form-control" name="nilai" value="{{ old('nilai') }}">

                                @if ($errors->has('nilai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nilai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Add Nilai
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
