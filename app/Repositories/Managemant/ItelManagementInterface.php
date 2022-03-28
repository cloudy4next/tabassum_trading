<?php

namespace App\Repositories\Managemant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

interface ItelManagementInterface
{
    
    public function itelDailySales(Request $request);

}