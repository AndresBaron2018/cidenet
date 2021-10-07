<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Trip;
use App\Vehicle;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_of_admission', 'surname', 'second_surname', 'first_name', 'other_name', 'country_of_employment', 'id_type', 'identification_card', 'email', 'state', 'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

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

    public function getRoleUserAttribute()
    {
        return $this->getRoleNames();
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'role_user'
    ];

    public function trip()
    {
        return $this->hasMany(Trip::class, 'id');
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id');
    }

    public function trips()
    {
        return $this->hasMany('App\Trip', 'user_trip_vehicle')
            ->withPivot('vehicle_id', 'status');
    }

    public function Vehicles()
    {
        return $this->belongsTo('App\Vehicle', 'user_trip_vehicle')
            ->withPivot('trip_id', 'status');
    }
}
