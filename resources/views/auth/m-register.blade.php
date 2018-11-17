<!-- ===== Customized Registration form ===== -->
@extends('layouts.guestheader')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">@lang('Register')</div>
          @if(session()->has('message'))
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
          @endif

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">@lang('Name')</label>

                <div class="col-md-6">
                  <input id="name1" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">@lang('Username')</label>

                <div class="col-md-6">
                  <input id="name2" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                  @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              
              <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">@lang('Division')</label>

                <div class="col-md-6">
                  <select name="group" class="form-control">
                      <option value="">--@lang('Select') @lang('Division')--</option>
                      @foreach ($groups as $group => $value)
                      <option value="{{ $value }}"> {{ $value }}</option>   
                      @endforeach
                  </select>

                  <!-- <input id="name" type="text" class="form-control" name="group" value="{{ old('group') }}" required autofocus>  -->

                  @if ($errors->has('group'))
                    <span class="help-block">
                      <strong>{{ $errors->first('group') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">@lang('E-Mail Address')</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">@lang('Password')</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">@lang('Confirm Password')</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    @lang('Register')
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