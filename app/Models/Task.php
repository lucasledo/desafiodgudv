<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'done_date',
        'status',
        'user_id'
    ];

    protected $casts = [
        'done_date' => 'datetime'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getStatusLabelAttribute()
    {
        if($this->status){
            return 'Concluída';
        }

        return 'Não Concluída';
    }
}
