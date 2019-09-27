@extends('layouts.app')

@section('content')
        <div class="text-center pb-3">
            <h4>ログイン</h4>
        </div>

        {!! Form::open(['route' => 'login.post']) !!}
            <div class="row justify-content-center pb-2">
                <div class="col-sm-2 text-right">
                    {!! Form::label('email', 'メールアドレス：') !!}
                </div>
                <div class="col-sm-5">
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row justify-content-center pb-2">
                <div class="col-sm-2 text-right">
                    {!! Form::label('password', 'パスワード：') !!}
                </div>
                <div class="col-sm-5">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row justify-content-center pt-2">
                <div class="col-sm-7">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
@endsection