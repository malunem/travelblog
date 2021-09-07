<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'img',
        'author_id',
        'magazines'
    ];

    public function getAuthor(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getTags(){
        return $this->belongsToMany(Tag::class);
    }
}