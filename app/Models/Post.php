<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'cover_path',
        'status',
    ];

    static $statuses = [
        'on-check',
        'publish',
        'rejected',
        'archived',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function uploadCover(?UploadedFile $file)
    {
        if($file) 
        {
            if ($this->cover_path) {
                Storage::delete($this->cover_path);
            }

            $this->cover_path=$file->store('public/covers');
            $this->save();
            return 12;
        }
    }

    public function getCoverUrlAttribute()
    {
        return url(Storage::url($this->cover_path));
    }
}
