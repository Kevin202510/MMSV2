<!-- <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li> -->
<!-- <ul class="sidebar-menu {{ Request::is('*') ? 'active' : '' }}"> -->
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
            <li class="{{ Request::is('home*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('home') }}"><i class="fas fa-tachometer-alt"></i></i> <span>Dashboard</span></a></li>
        </li>
        <li class="menu-header">Sensors</li>
        <!-- <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
        </li> -->
        <li class="side-menus {{ Request::is('temperature*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Temperature') }}"><i class="fas fa-temperature-high"></i><span>Temperature Sensor</span></a></li>
        <li class="side-menus {{ Request::is('humidity*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Humidity') }}"><i class="fas fa-humidity"></i><span>Humidity Sensor</span></a></li>
        <li class="side-menus {{ Request::is('light*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Light') }}"><i class="fas fa-lightbulb-on"></i><span>Light Sensor</span></a></li>
        <li class="side-menus {{ Request::is('carbondioxide*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('CarbonDioxide') }}"><i class="fas fa-sensor-smoke"></i><span>CO2 Sensor</span></a></li>
        <li class="side-menus {{ Request::is('video*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Video') }}"><i class="fas fa-video"></i><span>Video Feed Mushroom House</span></a></li>
        <li class="menu-header">Sensors Settings</li>
        <li class="side-menus {{ Request::is('sensorsconfiguration') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Sensor Configuration') }}"><i class="fas fa-cogs"></i><span>Sensors Configuration</span></a></li>
        <li class="side-menus {{ Request::is('sensorsconfigurationhistory') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Sensor Configuration History') }}"><i class="fas fa-cogs"></i><span>Sensors Configuration History</span></a></li>
        <!-- <li class="side-menus {{ Request::is('soil*') ? 'active' : '' }}"><a class="nav-link" href=" route('SoilMoisture') }}"><i class="fas fa-dewpoint"></i><span>Soil Moisture Sensor</span></a></li> -->
        <!-- <li class="side-menus {{ Request::is('water*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('WaterLevel') }}"><i class="fas fa-sprinkler"></i><span>Water Sprinkler Sensor</span></a></li> -->
        @if(\Illuminate\Support\Facades\Auth::user()->role_id==1 )
        <!-- <li><a class="nav-link" href="{{ route('Temperature') }}"><i class="far fa-square"></i> <span>Water Level Sensor</span></a></li> -->

        <li class="menu-header">Management</li>
        <!-- <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
        </li> -->
        <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('Users') }}"><i class="fas fa-users"></i><span>Users</span></a></li>
        <!-- <li class="side-menus {{ Request::is('roles*') ? 'active' : '' }}"><a class="nav-link" href=" route('Roles') }}"><i class="fas fa-key"></i><span>Roles</span></a></li> -->
        <!-- <li><a class="nav-link" href="{{ route('Temperature') }}"><i class="far fa-square"></i> <span>Light Sensor</span></a></li>
        <li><a class="nav-link" href="{{ route('Temperature') }}"><i class="far fa-square"></i> <span>CO2 Sensor</span></a></li>
        <li><a class="nav-link" href="{{ route('Temperature') }}"><i class="far fa-square"></i> <span>Soil Moisture Sensor</span></a></li>
        <li><a class="nav-link" href="{{ route('Temperature') }}"><i class="far fa-square"></i> <span>Water Sprinkler Sensor</span></a></li> -->
        @endif
    <!-- </ul> -->