@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <h4><a class="font-weight-bold">{{ $task->name }}</a> の詳細・編集</h4>
</div>

{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('type_id', '種類：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('type_id', $task->type->get_type_list(), $task->type->id, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('name', '案件名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('name', $task->name, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('status_id', 'ステータス：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('status_id', $task->status->get_status_list() , $task->status->id, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('period', '納品日：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('period', $task->period, ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('char_counts', '文字数：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::number('char_counts', $task->char_counts, ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('note', 'メモ：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::textarea('note', $task->note, ['class'=>'form-control ']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('company_id', '企業名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('company_id', $task->company->get_company_list() , old('company_id'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('price', '金額：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::number('price', $task->price, ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('更新', ['class' => 'btn btn-block btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}

<div class="row justify-content-center mb-3">
    <div class="col-sm-8 text-right font-weight-bold">
        {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-block btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

<div class="row justify-content-center mb-3">
    <div class="col-sm-8 text-right font-weight-bold">
        {!! Form::model($task, ['route' => ['tasks.duplicate', $task->id], 'method' => 'put']) !!}
            {!! Form::submit('複製', ['class' => 'btn btn-block btn-warning']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection