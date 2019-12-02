@include('flash::message')
@extends('master')

@section('content')
    <form action="{{ route('signin.store') }}" method="POST">
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
                <input id="signin" type="submit" name="submit">
            </div>
        </div>
    </form>
    <a href ="{{route('register.index')}}">register</a>
    <a href ="{{route('remind.create')}}">비번 찾기</a>

@stop
