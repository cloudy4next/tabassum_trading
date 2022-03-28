<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>


<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-mobile"></i> ITEL</a>
	<ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-product') }}'><i class='nav-icon la la-question'></i> Itel products</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('itel/itel-sales') }}'><i class='nav-icon la la-question'></i>Daily sales</a></li>
        
    </ul>
</li>