<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
        protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'amount',
        'notes',
        'date',
    ];

    // علاقة: الـ Expense بتاعت يوزر واحد
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة: الـ Expense بتاعت category واحدة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
