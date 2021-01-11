<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BookGallery extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'databook_id', 'photo'
    ];

    protected $hidden = [];

    public function databook()
    {
        return $this->belongsTo(DataBook::class, 'databook_id', '_id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
