<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentsField extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'surname', 'name', 'gender', 'address', 'phone_number', 'image', 'birthday',
        'group_id', 'parent_surname', 'parent_name', 'is_trial', 'payment_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
