<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    protected $fillable = [
        'name', 'address'
    ];

    public function Blog(){
        return $this->belongsTo(Blog::class);
    }
}
