<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'city_name',
        'price',
        'places_available',
        'date',
        'category_id',
        'validated',
        'user_id',
        'acceptation_method'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
