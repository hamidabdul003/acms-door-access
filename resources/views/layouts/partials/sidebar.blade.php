<div class="sidebar" id="sidebar">

    <div class="brand">

        <h3>
            <i class="bi bi-shield-lock-fill text-info"></i>
            ACMS
        </h3>

        <small>Access Control System</small>

    </div>

    <div class="menu">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('cards.index') }}"
   class="{{ request()->routeIs('cards.*') ? 'active' : '' }}">
    <i class="bi bi-credit-card-2-front"></i>
    RFID Cards
</a>

<a href="{{ route('devices.index') }}"
   class="{{ request()->routeIs('devices.*') ? 'active' : '' }}">
    <i class="bi bi-hdd-network"></i>
    Devices
</a>

<a href="{{ route('permissions.index') }}"
   class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">
    <i class="bi bi-person-check"></i>
    Permissions
</a>

<a href="{{ route('logs.index') }}"
   class="{{ request()->routeIs('logs.*') ? 'active' : '' }}">
    <i class="bi bi-door-open"></i>
    Access Logs
</a>

<a href="{{ route('reports.index') }}"
   class="{{ request()->routeIs('reports.*') ? 'active' : '' }}">
    <i class="bi bi-graph-up"></i>
    Reports
</a>

<a href="{{ route('settings.index') }}"
   class="{{ request()->routeIs('settings.*') ? 'active' : '' }}">
    <i class="bi bi-gear"></i>
    Settings
</a>

    </div>

    <div class="position-absolute bottom-0 start-0 end-0 p-3 border-top border-secondary">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="btn btn-outline-light w-100">

                <i class="bi bi-box-arrow-left"></i>

                Logout

            </button>

        </form>

    </div>

</div>
