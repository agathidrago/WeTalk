<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        if ($this->image){
            $imagePath = $this->image;
            return  '/storage/' . $imagePath;
        }
        return 'https://cdn.clipart.email/eef4af4b2e49a6da5df965980fbea1cb_convo_750-750.png';
    }

    public function followers()
    {

         return $this->belongsToMany(User::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
