<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title', 'description', 'price', 'category_id', 'user_id', 'is_accepted', 'created_at'];

    public function getIsNewAttribute() {
        //!Metodo Francesco
        // $now = Carbon::now()->subHours(24)->toDateTimeString();
        // if($this->created_at >= $now){
        //     return true;
        // } 
        // return false;

        //!Metodo Marko
        $newAnnouncement = explode(' ', $this->created_at->diffForHumans());
        if($newAnnouncement[1] == 'seconds' || 
           $newAnnouncement[1] == 'hour' || 
           $newAnnouncement[1] == 'hours' || 
           $newAnnouncement[1] == 'minutes' ||
           $newAnnouncement[1] == 'secondi' ||
           $newAnnouncement[1] == 'minuti' ||
           $newAnnouncement[1] == 'ore' ||
           $newAnnouncement[1] == 'ora' || 
           $newAnnouncement[2] == 'segundos' || 
           $newAnnouncement[2] == 'hora' || 
           $newAnnouncement[2] == 'horas' || 
           $newAnnouncement[2] == 'minutos') return true;
        return false;
    }
    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $category, 
        ];
        return $array;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function is_accepted($bool)
    {
        $this->is_accepted = $bool;
        $this->save();
        return true;
    }
    public function getName () {
        return $this->title;
    }
    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
