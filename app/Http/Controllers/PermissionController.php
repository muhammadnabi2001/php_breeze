<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission()
    {
        $permissiongroup=PermissionGroup::all();
        return view('Permission.permission',['permissiongroup'=>$permissiongroup]);

    }
}
