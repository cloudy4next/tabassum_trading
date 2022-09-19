<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>


@if (backpack_user()->hasRole('Super admin'))
    {{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboards') }}"><i class="las la-home"></i> <span>Dashboard</span></a></li> --}}

    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i
                        class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i
                        class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i
                        class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endif

{{-- @if (backpack_user()->hasRole('admin_itel') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> ITEL Stock</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-product') }}'><i
                        class="las la-industry"></i> ITEL Products</a></li>
        </ul>
    </li>
@endif --}}

{{-- @if (backpack_user()->hasRole('admin_itel') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> ITEL Sales</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-sales') }}'><i
                        class="las la-folder-minus"></i> Daily sales</a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-daily-sale') }}'><i
                        class="las la-store"></i>Daily Sold</a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-daily-upfront') }}'><i
                        class="las la-balance-scale"></i> Itel Daily Upfronts</a></li>
        </ul>
    </li>
@endif

@if (backpack_user()->hasRole('admin_itel') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> ITEL Expense</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel_expense/itel-expense') }}'><i
                        class="las la-user-tie"></i> Itel expenses</a></li>
        </ul>
    </li>
@endif --}}



{{-- Gp Slide bar started --}}

{{-- @if (backpack_user()->hasRole('admin_gp') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i>GP Stock</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/grammenphone-product') }}'><i
                        class="las la-sim-card"></i></i> GP Products</a></li>
        </ul>
    </li>
@endif

@if (backpack_user()->hasRole('admin_gp') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i>GP sales</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/grameenphone-sales') }}'><i
                        class="las la-sim-card"></i></i> Daily sales</a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/gp-daily-sale') }}'><i
                        class="las la-sim-card"></i></i> Daily Sold</a></li>
            <li class='nav-item'><a class='nav-link'
                    href='{{ backpack_url('grameenphone/grammenphone-daily-upfront') }}'><i
                        class="las la-balance-scale"></i> GP Upfronts</a></li>
        </ul>
    </li>
@endif

@if (backpack_user()->hasRole('admin_gp') || backpack_user()->hasRole('Super admin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> GP Expense</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('gp_expense/gp-expense') }}'><i
                        class="las la-user-tie"></i> Expense</a></li>
        </ul>
    </li>
@endif --}}


@if (backpack_user()->hasRole('Super admin'))
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i>
            Backups</a></li>
@endif

{{-- Dropshipping --}}


{{-- @if (backpack_user()->hasRole('dropshipping'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="lab la-amazon"></i> Amazon</a>
        <ul class="nav-dropdown-items">
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('aws_drop/amazon-order') }}'><i
                        class="lab la-amazon-pay"></i> Amazon Orders</a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('aws_drop/amazon-poroduct') }}'><i
                        class="lab la-product-hunt"></i> Amazon Sheet</a></li>

            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('aws_drop/aamazon-bproduct') }}'><i
                        class="las la-low-vision"></i> Banned Product</a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('aws_drop/amazon-extra-expense') }}'><i
                        class='nav-icon la la-question'></i> Amazon Expenses</a></li>
        </ul>
    </li>
@endif --}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('polar') }}'><i class='nav-icon la la-question'></i>
        Polars</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('polar-sms') }}'><i class='nav-icon la la-question'></i>
        Send sms</a></li>
