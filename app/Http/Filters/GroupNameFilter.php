<?php
/**
 * Created by PhpStorm.
 * User: Zhumabek Ruslan
 * Date: 30.05.2019
 * Time: 16:29
 */

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class GroupNameFilter implements Filter
{

    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->where('name', 'LIKE',  "%$value%");
    }
}
