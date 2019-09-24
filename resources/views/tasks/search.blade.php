<div class="text-center mb-3">
    <h4>検索条件</h4>
</div>

<form>
    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right">
            <label class="form-check-label font-weight-bold" for="status">ステータス：</label>
        </div>
        <div class="col-sm-6">
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="all" checked>
                <label class="form-check-label">すべて</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="unfinished">
                <label class="form-check-label">未完了</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="finished">
                <label class="form-check-label">完了</label>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            <label class="mb-0">納品日(開始/終了)：</label>
        </div>
        <div class="col-sm-3">
            <input type="date" class="form-control">
        </div>
        <div class="col-sm-3">
            <input type="date" class="form-control">
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-2 text-right font-weight-bold">
            <label class="mb-0">キーワード（件名）：</label>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="row justify-content-center mb-2">
        <div class="col-sm-8 text-right font-weight-bold">
            <submit class="btn btn-block btn-primary">検索</submit>
        </div>
    </div>
</form>