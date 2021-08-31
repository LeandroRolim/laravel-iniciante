<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $attributes = [
        'status' => 1,
    ];
    public const PENDING = 1;
    public const APPROVED = 2;
    public const DISAPPROVED = 3;

    protected $fillable = [
        'value',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getIsApprovedAttribute()
    {
        return $this->status == self::APPROVED;
    }
}
