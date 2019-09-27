<div class="text-center mb-3">
    <h4>リマインドメール設定</h4>
</div>

{!! Form::model($remainder, ['route' => ['remainders.update', $remainder->id], 'method' => 'put']) !!}
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('send_stat', '配信設定：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="send_stat" name="send_stat">
                <option value="0" {{ ($remainder->send_stat == '0') ? 'selected' : '' }}>配信停止</option>
                <option value="1" {{ ($remainder->send_stat == '1') ? 'selected' : '' }}>配信する</option>
            </select>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            {!! Form::label('term', 'リマインド日：', ['class' => 'mb-0']) !!}
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="term" name="term">
                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{$i}}" {{ ($remainder->term == "$i") ? 'selected' : '' }}>{{$i}}日前</option>
                @endfor
            </select>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-sm-8 text-right font-weight-bold">
            {!! Form::submit('更新', ['class' => 'btn btn-block btn-success']) !!}
        </div>
    </div>
{!! Form::close() !!}