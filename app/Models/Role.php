<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Spatie\Permission\Models\Role as Spatie;
use Illuminate\Database\Seeder;


class Role extends Spatie
{
    const ADMIN = 'admin', SELLER ='seller';
    const AllRoles =[
        self::ADMIN,
        self::SELLER,
    ];

}
