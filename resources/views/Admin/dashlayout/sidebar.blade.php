<div id="sidebar-menu">
    <ul>
        <li class="menu-title">Main</li>
        <li>
            <a href="{{ route('fronts.index') }}" class="waves-effect">
                <i class="dripicons-home"></i>
                <span> My site </span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="dripicons-home"></i>
                <span> Dashboard </span>
            </a>
        </li>


        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> component </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="{{ route('sections.index') }}">Section</a></li>
                <li><a href="{{ route('products.index') }}">Product</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('clients.index') }}" class="waves-effect">
                <i class="fas fa-users"></i>
                <span> Clients </span>
            </a>
        </li>

    </ul>
</div>
