<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'email', 'password', 'device_token',
        'surname', 'name', 'gender', 'address', 'phone_number', 'image', 'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'device_token', 'deleted_at', 'created_at', 'updated_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function fields()
    {
        if ($this->role_id == 3)        return $this->hasOne(StudentsField::class);
        if ($this->role_id == 2)        return $this->hasOne(TeachersField::class);
    }

    public function student()
    {
        return $this->hasOne(StudentsField::class, 'user_id');
    }

    public function teacher()
    {
        return $this->hasOne(TeachersField::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        if ($this->role_id == 3)
            return $this->student->belongsTo(Group::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_teacher');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'teacher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }

    public function getGender()
    {
        return ($this->gender) ? "Парень" : "Девушка";
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getLastMessage()
    {
        $id = [$this->id, Auth::id()];
        return Chat::whereIn('from', $id)->orderBy('created_at', 'desc')->first()->message;
    }
}
