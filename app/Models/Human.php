<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Human extends Model
{
    use HasFactory,SoftDeletes;

  protected $fillable = ['name','age', 'job', 'income', 'meet', 'cost', 'img', 'user_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
  }
  public function scopeOwnedByUser($query, $userId)
  {
      return $query->where('user_id', $userId);
  }

}
