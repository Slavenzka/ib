<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $ROLES = [
        'admin' => 'Админ',
        'manager' => 'Менеджер',
        'author' => 'Автор',
        'customer' => 'Клиент',
    ];
}
