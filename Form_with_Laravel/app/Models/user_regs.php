<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_regs extends Model
{
    public $tabel = 'user_reg';
    use HasFactory;
    protected $guarded = [];
    protected $with = ['roundups'];
      public function getRouteKeyName()
      {
          return 'slug';
      }
      public function roundups()
      {
          return $this->hasMany(Roundup::class);
      }
    public $fillable = ['full_name', 'user_name', 'birthdate', 'phone','address','password','confirm_password','email','user_image'];


}
