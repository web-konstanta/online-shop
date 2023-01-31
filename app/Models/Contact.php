<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;

    public static function getStatus(bool $status): string
    {
        switch ($status) {
            case 0:
                return 'Не отвеченное';
            case 1:
                return 'Отвеченное';
        }
    }
}
