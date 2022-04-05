<?php

namespace App\Filters;

use Illuminate\Support\Carbon;

class UserFilter extends QueryFilter
{
    public function rules(): array
    {
        return [
        'search' => 'filled',
        'from' => 'filled|date_format:d/m/Y',
        'to' => 'filled|date_format:d/m/Y',
    ];
    }
    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('surname', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }
    public function from($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);

        $query->whereDate('created_at', '>=', $date);
    }
    public function to($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);

        $query->whereDate('created_at', '<=', $date);
    }
}
