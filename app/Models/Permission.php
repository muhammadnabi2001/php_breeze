<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=[
        'name',
        'key',
        'permission_goup_id'
    ];
    public function roles()
    {
        return $this->belongsToMany('role_permissions','permission_id','role_id');
    }
    public function permissionGroup()
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id');
    }
}
