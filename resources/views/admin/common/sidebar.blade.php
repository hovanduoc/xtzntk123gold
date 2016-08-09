  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="{{ Request::is('dashboard/result') ? 'active' : '' }}">
                    <a href="{!! url('dashboard/result') !!}"><i class="fa fa-fw fa-cog"></i> Fake Link</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
<div id="page-wrapper">