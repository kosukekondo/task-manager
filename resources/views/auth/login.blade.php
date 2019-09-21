@extends('layouts.app')

@section('content')
        <div class="text-center pb-3">
            <h4>ログイン</h4>
        </div>

        <form>
            <div class="row justify-content-center pb-2">
                <div class="col-sm-2 text-right">
                    <label>メールアドレス：</label>
                </div>
                <div class="col-sm-5">
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center pb-2">
                <div class="col-sm-2 text-right">
                    <label>パスワード：</label>
                </div>
                <div class="col-sm-5">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center pt-2">
                <div class="col-sm-7">
                    <submit class="btn btn-block btn-primary">ログイン</submit>
                </div>
            </div>
        </form>
@endsection