@extends('layouts.app')

@section('content')
<div class="text-center mb-3">
    <h4>タスクの作成</h4>
</div>

{!! Form::model($task, ['route' => 'tasks.store']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('type_id', '種類：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('type_id', $type->get_type_list(), old('type_id'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('name', '案件名：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('status_id', 'ステータス：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('status_id', $status->get_status_list() , old('status_id'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('period', '納品日：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('period', old('period'), ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('char_counts', '文字数：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::number('char_counts', old('char_counts'), ['class'=>'form-control']) !!}
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('note', 'メモ：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::textarea('note', old('note'), ['class'=>'form-control ']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('作成', ['class' => 'btn btn-block btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}

@endsection