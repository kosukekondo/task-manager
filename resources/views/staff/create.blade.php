@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <h4>担当者の作成</h4>
</div>

{!! Form::model($staff, ['route' => 'staff.store']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('company_id', '企業名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('company_id', $company->get_company_list(), old('company_id'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('name', '担当者名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('追加', ['class' => 'btn btn-block btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}

@endsection