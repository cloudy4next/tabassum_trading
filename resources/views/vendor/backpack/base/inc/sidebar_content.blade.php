<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel-daily-upfront') }}'><i class="las la-balance-scale"></i> Itel Daily Upfronts</a></li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> ITEL</a>
	<ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-product') }}'><i class="las la-industry"></i> Itel products</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-sales') }}'><i class="las la-folder-minus"></i> Daily sales</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-daily-sale') }}'><i class="las la-store"></i>Daily Sold</a></li>
    
    </ul>
</li>


<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> Grameenphone</a>
	<ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/grameenphone-product') }}'><i class='nav-icon la la-question'></i> Products</a></li>        
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/grameenphone-sales') }}'><i class="las la-folder-minus"></i> Daily sales</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grameenphone/grameenphone-dailysale') }}'><i class='nav-icon la la-question'></i> Daily sold</a></li>    
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> Backups</a></li>

{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fb') }}'><i class='nav-icon la la-hdd-o'></i> fb</a></li> --}}

