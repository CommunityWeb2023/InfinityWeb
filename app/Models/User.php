<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Laravel\Ban\Traits\Bannable;
use Flyff\Modules\User\Models\Traits\HasAccounts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use LaravelAndVueJS\Traits\LaravelPermissionToVueJS;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableInterface;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable implements BannableInterface
{
    use HasApiTokens;
    use HasFactory;
    //use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use LaravelPermissionToVueJS;
    use HasRoles;
    use Searchable;
    use HasAccounts;
    use Bannable;
    use AuthenticationLogable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:l, d F Y',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'first_role',
        'isBanned',
        'last_login_at',
        'last_login_ip',
    ];

    public function getLastLoginAtAttribute(): string
    {
        return $this->lastLoginAt()?->format('l, d F Y - H:i:s') ?? 'Never';
    }

    public function getLastLoginIpAttribute(): string
    {
        $ip = $this->lastLoginIp();
        if ($ip === null) return 'Never';
        return substr($ip, 0, 3) . '.***.' . substr($ip, -3) ?? 'Never';
    }


    public function getProfilePhotoUrlAttribute(): string
    {
        return 'https://ui-avatars.com/api/?name='. $this->username[0] .'&color=7F9CF5&background=EBF4FF';
    }

    public function getFirstRoleAttribute(): string
    {
        return $this->roles->first()->name;
    }

    public function getIsBannedAttribute(): bool
    {
        return $this->isBanned();
    }

    public function searchableAs()
    {
        return 'users_index';
    }

    public function toSearchableArray()
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
