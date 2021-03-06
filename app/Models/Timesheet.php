<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Task;
use App\User;

class Timesheet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'date', 'problem', 'plan'
    ];

    // protected $dateFormat = 'Y-m-d';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id', 'user_id'
    ];

    // protected $dates = [
    //     'date', 'created_at', 
    // ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
