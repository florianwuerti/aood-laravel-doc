@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">Log In</h1>
                    <form action="{{'login'}}" method="post" role="form">
                        {{csrf_field()}}
                        <div class="field">
                            <label for="email" class="label">Email Address</label>
                            <div class="control">
                                <input type="email" id="email" name="email"
                                       class="input {{$errors->has('email') ? 'is-danger' : ''}}"
                                       placeholder="name@example.com" value="{{old('email')}}">
                            </div>
                            @if($errors->has('email'))
                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <div class="control">
                                <input type="password" id="password" name="password"
                                       class="input {{$errors->has('password') ? 'is-danger' : ''}}">
                            </div>
                            @if($errors->has('password'))
                                <p class="help is-danger">{{$errors->first('password')}}</p>
                            @endif
                        </div>

                        <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>
                        <button type="submit"
                                class="button is-primary is-outlined is-fullwidth m-t-30"> {{ __('Log In') }}</button>
                    </form>
                </div><!-- end of .card-content -->
            </div><!-- end of .card-->
            <h5 class="has-text-centered m-t-20">
                <a href="{{route('password.request')}}" class="is-muted">{{ __('Forgot Your Password?') }}</a></h5>
        </div>
    </div>
@endsection
