<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Traits\UserHelperMethods;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'first_name', 'last_name', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
    
    # Static Helper Methods
    
    /**
     * Returns registration rules
     *
     * @return array
     */
    public static function registrationRules($data)
    {
        $rules = array_merge([
            'primary_parental' => [
                'required', 'array',
            ],
            'secondary_parental' => [
                'nullable', 'array', //new Rules\ParentalHasData,
            ],
            'subscription' => [
                'required', //Rule::in(AvailableSubscription::availableOptionsIds()),
            ],
            'student_count' => [
                'required', 'numeric', 'min:1', //new Rules\MaxStudentsPerSubscription($data),
            ],
            'students' => [
                'required', 'array', //new Rules\SameStudentCountAsRequested($data),
            ],
        ], static::parentalRules('primary_parental', $data),
        static::parentalRules('secondary_parental', $data),
        static::studentRules($data));

        //dd($rules);
        return $rules;
    }
    
    /**
     * Returns rules to Register as a Parent
     *
     * @return array
     */
    public static function parentalRules($key, array $data)
    {
        return [
            "$key.first_name" => [
                'required', 'string', 'max:50',
            ],
            "$key.last_name" => [
                'required', 'string', 'max:50',
            ],
            "$key.username" => [ 
                'required', 'string', 'min:6', 'max:15', 'unique:users,username', //new Rules\UniqueUsername($data), 
            ],
            "$key.email" => [
                'required', 'string', 'email', 'max:80', 'unique:users,email', //new Rules\UniqueEmail($data),
            ],
            "$key.password" => [
                'required', 'string', 'min:8', 'max:100', 'confirmed'
            ],
        ];
    }

    /**
     * Returns rules to Register as a Parent
     *
     * @return array
     */
    public static function studentRules(array $data)
    {
        return [
            "students.*.first_name" => [
                'required', 'string', 'max:50'
            ],
            "students.*.last_name" => [
                'required', 'string', 'max:50'
            ],
            "students.*.username" => [ 
                'required', 'alpha_num', 'min:6', 'max:15', 'unique:users,username', //new Rules\UniqueUsername($data), 
            ],
            "students.*.email" => [
                'nullable', 'email', 'max:80', 'unique:users,email', //new Rules\UniqueEmail($data),
            ],
            "students.*.password" => [
                'required', 'string', 'min:8', 'confirmed'
            ],
        ];
    }
}
