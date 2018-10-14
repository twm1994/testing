<?php

namespace App;

Use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeFilter($query, $filters){

        if (in_array('year', $filters) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
        if (in_array('month', $filters) && $month = $filters['month']) {
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

    }

    public static function archives(){
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
    public function addComment($body){
        // $this->comments()->create(compact('body'));
        // $this->comments->create(['body' => $body]);
        Comment::create([
          'body' => $body,
          'post_id' => $this->id
        ]);
    }
}
