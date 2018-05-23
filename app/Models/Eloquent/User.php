<?php

namespace App\Models;

use App\Mail\ResetPasswordMail;
use App\Models\Enums\Roles;
use App\Models\Services\UsersService;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Saritasa\Roles\HasRole;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property bool $confirmed
 * @property int $role_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property Role $role
 * @property \Illuminate\Database\Eloquent\Collection $listings
 * @property \Illuminate\Database\Eloquent\Collection $bids
 * @property Profile $profile
 * @property \Illuminate\Database\Eloquent\Collection $purchases
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method static Builder|User whereConfirmed($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRoleId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends \Saritasa\Database\Eloquent\Models\User
{
    use Notifiable, HasRole;

    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const ROLE_ID = 'role_id';
    const REMEMBER_TOKEN = 'remember_token';
    const CONFIRMED = 'confirmed';
    const PROFILE = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        self::ID,
        self::EMAIL,
        self::NAME,
        self::PROFILE,
        self::CREATED_AT
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    protected $guarded = [
        self::CONFIRMED,
        self::ROLE_ID,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        self::CONFIRMED => 'bool',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return UsersService::CHANNEL_PREFIX . $this->id;
    }

    /**
     * Returns role of this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Returns all user Organizations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizations()
    {
        return $this->hasMany(Organizations::class);
    }

    /**
     * Returns user profile. If profile not exists empty profile will be returned.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class, self::ID, Profile::USER_ID)
            ->withDefault(function () {
                return new Profile([Profile::USER_ID => $this->id]);
            });
    }

    /**
     * Password attribute mutator. Ignores tries to set empty password.
     *
     * @param string $password New password value
     */
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            parent::setPasswordAttribute($password);
        }
    }

    /**
     * Returns TRUE if a user belongs to the ADMIN role and FALSE otherwise.
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->role && $this->hasRole(Roles::ADMIN);
    }

    /**
     * Send the password reset notification.
     * Overwrites standard method to send notification.
     *
     * @param  string $token Reset password token to send
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        \Mail::to($this)->send(new ResetPasswordMail($token, $this->name));
    }
}
