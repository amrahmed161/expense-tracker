<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $fillable = [
        'name',
        'icon',
        'color',
    ];

    // علاقة: الـ Category عندها كتير من الـ Expenses
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
