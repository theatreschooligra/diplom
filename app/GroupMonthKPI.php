<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMonthKPI extends Model
{
    protected $table = 'group_month_kpi';

    protected $fillable = [
        'group_id',
        'month',
        'start_amount',
        'left_amount',
        'bought_amount',
    ];

    protected $dates = [
        'created_at',
        'uodated_at',
        'month'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
