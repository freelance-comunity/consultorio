<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-hospital-o'></i> <span>Inicio</span></a></li>
           
            <li><a href="{{ url('doctors') }}"><i class='fa fa-stethoscope'></i> <span>Medicos</span></a></li>
            
            <!--<li class="treeview">
                <a href="#"><i class='fa fa-hospital-o'></i> <span>Control</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/patients') }}">Pacientes</a></li>
                    <li><a href="{{ url('/consulations') }}">Consultas</a></li>
                    <li><a href="{{ url('nurses') }}">Enfermeras</a></li>
                </ul>
            </li>-->
            <li><a href="{{ url('patients') }}"><i class='fa fa-plus-square'></i> <span>Pacientes</span></a></li>
            <li><a href="{{ url('consulations') }}"><i class='fa fa-heartbeat'></i> <span>Consultas</span></a></li>
            @role('admin')
            <li><a href="{{ url('nurses') }}"><i class='fa fa-medkit'></i> <span>Enfermeras</span></a></li>
            @endrole
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
