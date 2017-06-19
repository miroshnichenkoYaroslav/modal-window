<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @var array для работы с моделькой */
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    /** @var array для возможности восстановления после удаления */
    protected $dates = ['deleted_at'];
}
