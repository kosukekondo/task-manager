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
                        <li class="nav-item">{!! link_to_route('remainders.edit', 'リマインドメール設定', 1, ['class' => 'nav-link']) !!}</li>

                        <li class="nav-item">{!! link_to_route('invoices.index', '請求管理', [], ['class' => 'nav-link']) !!}</li>

                        <li class="nav-item">{!! link_to_route('sales.index', '売上一覧', [], ['class' => 'nav-link']) !!}</li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">担当者</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">{!! link_to_route('staff.index', '担当者一覧', []) !!}</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">{!! link_to_route('staff.create', '担当者追加', []) !!}</li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">企業</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">{!! link_to_route('companies.index', '企業の一覧', []) !!}</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">{!! link_to_route('companies.create', '企業の新規作成', []) !!}</li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">タスク</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">{!! link_to_route('tasks.index', 'タスクの一覧', []) !!}</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">{!! link_to_route('tasks.create', 'タスクの新規作成', []) !!}</li>
                            </ul>
                        </li>

                        <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    @else
                        <li class="nav-item"><a href="/" class="nav-link"></a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>