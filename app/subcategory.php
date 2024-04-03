<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable=['subc_name','sub_des', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
