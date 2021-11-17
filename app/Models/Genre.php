<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function song(){
        return $this->belongsToMany(Song::class);
    }

    public static function storeGenre($name) {

        self::insert([
            'name' => $name
        ]);
    }

    public static function updateGenre($name, $id) {
        self::find($id)->update(['name' => $name]);
    }

    public static function deleteGenre($id) {
        self::find($id)->delete();
    }
}
