<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'human_id', 'user_id'];

    public function human()
  {
    return $this->belongsTo(Human::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);

  }

}
