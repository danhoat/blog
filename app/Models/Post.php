<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $attributes = array(
//        'ZipCode' => '',
//    );
    //protected  $cats = array();
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        //$this->cats = Category::all();

    }

    protected $appends = ['cate_name'];

    public function getCateNameAttribute(){

        $this->cat_name= $this->title;
       // $this->cat_name = $this->cats->where('id', $this->category_id)->first()->name;

        return  $this->cat_name;

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(USER::class);
    }
}
