@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <h4><a class="font-weight-bold">{{ $staff->name }}</a> の詳細・編集</h4>
</div>

{!! Form::model($staff, ['route' => ['staff.update', $staff->id], 'method' => 'put']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('name', '担当者名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('name', $staff->name, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('company_id', '企業：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::select('company_id', $staff->company->get_company_list(), $staff->company_id, ['class' => 'form-control']) !!}
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
        {!! Form::model($staff, ['route' => ['staff.destroy', $staff->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-block btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection