<div class="text-center mb-3">
    <h4>検索条件</h4>
</div>

{!! Form::open(['route' => 'sales.search']) !!}

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('period_year', '年：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::number('period_year', old('period_year'), ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('period_month', '月：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::number('period_month', old('period_month'), ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('検索', ['class' => 'btn btn-block btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}

<div class="row justify-content-center mt-3 mb-5">
    <div class="col-sm-2">
        {!! link_to_route('sales.specifiedterm', '前月', ['id' => 'lastmonth'], ['class' => 'btn btn-block btn-outline-info btn-sm ']) !!}
    </div>
    <div class="col-sm-2">
        {!! link_to_route('sales.specifiedterm', '今月', ['id' => 'thismonth'], ['class' => 'btn btn-block btn-outline-info btn-sm']) !!}
    </div>
    <div class="col-sm-2">
        {!! link_to_route('sales.specifiedterm', '来月', ['id' => 'nextmonth'], ['class' => 'btn btn-block btn-outline-info btn-sm']) !!}
    </div>
</div>