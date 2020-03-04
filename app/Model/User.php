<?php

namespace App\Model;
use App\Model\Question;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable =['name','email','password'];

    protected $hidden = ['password', 'remember_token'];

    public function question(){
    	return $this->hasMany(Question::class);
    }
}
