<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'resident_number',
        'custom_id', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function records()

    {
        return $this->hasMany(Record::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->custom_id = self::generateUniqueId();
        });
    }

    private static function generateUniqueId()
    {
        do {
            $id = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT); // Generate a random 7-digit number
        } while (self::where('custom_id', $id)->exists()); // Ensure it's unique

        return $id;
    }
}
