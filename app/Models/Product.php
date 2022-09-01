<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\taminotchi;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function taminotchi(){
        return $this->belongsTo(taminotchi::class)->withDefault();
    }

    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

}
