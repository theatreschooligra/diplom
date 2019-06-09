<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 09.0+.2019
 * Time: 20:19
 */

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UserNameFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->whereRaw("concat(surname, ' ', name) like '%". $value ."%'");
    }
}
