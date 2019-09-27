<div class="text-center mb-3">
    <h4>検索条件</h4>
</div>

{!! Form::open(['route' => 'tasks.search']) !!}

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right">
            {!! Form::label('status', 'ステータス：', ['class' => 'form-check-label font-weight-bold']) !!}
        </div>
        <div class="col-sm-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-info {{ ($status == '0') ? 'active' : '' }}">
                <input type="radio" name="status" id="status0" value="0" autocomplete="off" {{ ($status == '0') ? 'checked' : '' }}>すべて
              </label>
              <label class="btn btn-outline-info {{ ($status == '1') ? 'active' : '' }}">
                <input type="radio" name="status" id="status1" value="1" autocomplete="off" {{ ($status == '1') ? 'checked' : '' }}>未完了
              </label>
              <label class="btn btn-outline-info {{ ($status == '2') ? 'active' : '' }}">
                <input type="radio" name="status" id="status2" value="2" autocomplete="off" {{ ($status == '2') ? 'checked' : '' }}>完了
              </label>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-3">
            <a class="small">開始</a>
        </div>
        <div class="col-sm-3">
            <a class="small">終了</a>
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('period', '納品日（期間指定）：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('period_start', $period_start, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::date('period_end', $period_end, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 my-1"></div>
        <div class="col-sm-1 my-1">
            {!! link_to_route('tasks.specifiedterm', '前月', ['id' => 'lastmonth'], ['class' => 'btn btn-block btn-info btn-sm ']) !!}
        </div>
        <div class="col-sm-1 my-1">
            {!! link_to_route('tasks.specifiedterm', '今月', ['id' => 'thismonth'], ['class' => 'btn btn-block btn-info btn-sm']) !!}
        </div>
        <div class="col-sm-1 my-1">
            {!! link_to_route('tasks.specifiedterm', '来月', ['id' => 'nextmonth'], ['class' => 'btn btn-block btn-info btn-sm']) !!}
        </div>
        <div class="col-sm-2 my-1">
            {!! link_to_route('tasks.specifiedterm', '本日～7日後', ['id' => '7days'], ['class' => 'btn btn-block btn-info btn-sm']) !!}
        </div>
        <div class="col-sm-1 my-1">
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('keyword', 'キーワード（件名）：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('keyword', (is_null($keyword)) ? null : '', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('検索', ['class' => 'btn btn-block btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}

