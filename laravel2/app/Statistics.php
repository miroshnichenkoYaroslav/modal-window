<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    /**
     * массив для работы с моделькой
     *
     * @var array
     */
    protected $fillable = [
        'route'
    ];

    /**
     * разрешить не использовать время создания и обновления
     *
     * @var bool
     */
    public $timestamps = false;
}
