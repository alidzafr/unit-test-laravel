<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'category_id',
        'color',
        'description',
        'price',
        'qty',
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    // protected function filter(Builder $query, array $filters): void
    protected function filter(Builder $query): void
    {
        $query->where('name', 'like', '%' . request('search') . '%');
    }
}
