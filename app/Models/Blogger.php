<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    use HasFactory;

    protected $table = 'blogger';

    public function category(){
        return $this->belongsTo(Category::class);                
    }

    public function writter(){
        return $this->belongsTo(Writter::class);
    }
}
