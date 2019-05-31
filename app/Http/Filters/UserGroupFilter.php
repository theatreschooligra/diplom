<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 31.05.2019
 * Time: 18:25
 */

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UserGroupFilter implements Filter
{

    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->whereHas('student', function ($query) use ($value) {
            $query->where('group_id', $value);
        });
    }
}
