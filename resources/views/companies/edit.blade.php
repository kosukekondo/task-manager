@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <h4><a class="font-weight-bold">{{ $company->name }}</a> の詳細・編集</h4>
</div>

{!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'put']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('name', '企業名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('name', $company->name, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('更新', ['class' => 'btn btn-block btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}

<div class="row justify-content-center mb-3">
    <div class="col-sm-8 text-right font-weight-bold">
        {!! Form::model($company, ['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-block btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection