<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class DataBook extends Eloquent
{
    use SoftDeletes;
    protected $connection = 'mongodb';

    protected $fillable = [
        'kode', 'judul', 'penulis', 'penerbit', 'tahun_terbit'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(BookGallery::class, 'databook_id', '_id');
    }
}
