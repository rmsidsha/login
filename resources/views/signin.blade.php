@include('flash::message')
@extends('master')

@section('content')
    <form action="" method="POST">
        {!! csrf_field() !!} 

        <div>
            <label for="id">{{ __('ID') }} </label>
            <div>
                <input id="user_id" type="text" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>
                @error('user_id')
                    <span class="inavlid-feedback" role="alert">
                        <strong>{{ $message }}</strong>  
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <label>
                PASSWORD
            </label>
            <div>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="inavlid-feedback" role="alert">
                        <strong>{{ $message }}</strong>  
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <div>
                <input id="login" type="submit" name="submit">
            </div>
        </div>
    </form>
    <form method="GET" action="{{route('register.index')}}">
        <div>
            <div>
                <input type="button" id="go_register" name="go_register" value="register">
            </div>
        </div>
    </form>
@stop
