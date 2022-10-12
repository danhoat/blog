<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

//    protected $attributes = array(
//        'ZipCode' => '',
//    );
    //protected  $cats = array();
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        //$this->cats = Category::all();

    }

    //protected $appends = ['category','author','cate_name','post_date','comments'];

    public function getCateNameAttribute(){

        $this->cat_name= $this->title;
       // $this->cat_name = $this->cats->where('id', $this->category_id)->first()->name;
        return  $this->cat_name;

    }
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query) =>
        $query
            ->where(fn($query)=>
                $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%')
        ));

        $query->when($filters['category'] ?? false, fn($query, $category) => $query
            ->whereHas('category', fn($query) =>
                $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn($query, $category) => $query
            ->whereHas('author', fn($query) =>
                $query->where('username', $category))
        );
        return $query;

    }
    public  function comments(){
        return $this->hasMany(Comment::class,'post_id')->orderByDesc('created_at');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        //return $this->belongsTo(USER::class,'author_id');
        return $this->belongsTo(USER::class,'author_id');
    }


    public function getPostDateAttribute(){

        $this->post_date = date('M d, Y', strtotime($this->created_at) );
        return $this->post_date;

    }
    public function setPostDateAttribute(){
        $this->post_date = date('M d, Y', strtotime($this->created_at) );
    }
}
