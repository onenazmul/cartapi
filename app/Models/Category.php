<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'order'
    ];
    public function scopeParents(Builder $builder){
        $builder->whereNull('parent_id');
    }
    public function scopeOrdered(Builder $builder, $direction = 'desc'){
        $builder->orderBy('order', $direction);
    }
    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
