<?php

namespace App\Filters;

class UserFilter extends QueryFilter
{
public function rules():array{
    return [
        'search' => 'filled',

    ];
}
    public function search($query, $search)
    {
        return $query->where(function($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        });
    }

}
