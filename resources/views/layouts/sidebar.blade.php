<a href="{{ route('tickets.index') }}" class="brand-link text-center">
    <b><span>{{ ucfirst(Auth::user()->name) ?? '' }}</span></b>
</a>

<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Tickets
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tickets.create') }}" class="nav-link">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Create Ticket</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tickets.index') }}" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Tickets Lists</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
