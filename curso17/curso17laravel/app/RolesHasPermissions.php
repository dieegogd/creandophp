<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesHasPermissions extends Model
{
    protected $table = 'role_has_permissions';

    protected $fillable = [
        "role_id",
        "permission_id",
    ];
}
