<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Spatie\Permission\Models\Permission as Spatie;

class Permission extends  Spatie
{
    //seller
    const REQUEST_PRODUCT = 'request product';
    const UPDATE_PRODUCT_PERFORMANCE = 'update product performance';
    const MAKE_PAYMENT = 'make payment';

    //admin
    const ADD_PRODUCT= 'add product';
    const ADD_USER= 'add user';//edit user details including passwords
    const APPROVE_REQUEST= 'approve request';
    const ISSUE_INVOICE= 'issue invoice';
    const MANAGE_FILES = 'manage files';
    const MANAGE_CALENDER = 'manage calender';

    const AllPermissions = [
        //seller
        self::REQUEST_PRODUCT,
        self::UPDATE_PRODUCT_PERFORMANCE,
        self::MAKE_PAYMENT,

        //admin
        self::ADD_PRODUCT,
        self::ADD_USER,
        self::APPROVE_REQUEST,
        self::ISSUE_INVOICE,
        self::MANAGE_CALENDER,
        self::MANAGE_FILES
    ];

    const AllPermissionsRoleAssigned = [
        self::MAKE_PAYMENT=>[Role::SELLER],
        self::REQUEST_PRODUCT=>[Role::SELLER],
        self::UPDATE_PRODUCT_PERFORMANCE=>[Role::SELLER],
        //admin
        self::ADD_PRODUCT=>[Role::ADMIN],
        self::ADD_USER=>[Role::ADMIN],
        self::APPROVE_REQUEST=>[Role::ADMIN],
        self::ISSUE_INVOICE=>[Role::ADMIN],
        self::MANAGE_FILES=>[Role::ADMIN],
        self::MANAGE_CALENDER=>[Role::ADMIN],
  ];

    static function validateRolePermissions($role){
        $permission_exists = array_filter(self::AllPermissionsRoleAssigned,function ($each_permission) use ($role){
            return in_array($role, $each_permission);
        });
        return array_keys($permission_exists);

    }
}
