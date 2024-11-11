<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Task
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Task extends Model
{
    use HasFactory;

    protected $perPage = 10;

    // default value for status
    protected $attributes = [
        'status' => 0,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description', 'status'];

    public const STATUSES = [
        0 => 'Todo',
        1 => 'In Progress',
        2 => 'Completed',
    ];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->attributes['status']];
    }
}
