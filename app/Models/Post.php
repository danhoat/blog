<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $attributes = array(
        'ZipCode' => '',
    );
    //protected  $cats = array();
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        //$this->cats = Category::all();

    }

    protected $appends = ['cate_name'];

    static function all($columns = ['*']){
        $posts = parent::all();
        return $posts;
    }
    public function getCateNameAttribute(){

        $this->cat_name= $this->title;
       // $this->cat_name = $this->cats->where('id', $this->category_id)->first()->name;

        return  $this->cat_name;

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    static function list(){
        $post = Post::all();
        return $post;
    }
}
