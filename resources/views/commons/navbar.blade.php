<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/tasks">Task Manager</a>
             
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item"><a href="#" class="nav-link">リマインドメール設定</a></li>
                        <li class="nav-item">{!! link_to_route('tasks.create', 'タスク作成', [], ['class' => 'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('tasks.index', 'タスク一覧', [], ['class' => 'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    @else
                        <li class="nav-item"><a href="/" class="nav-link"></a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>