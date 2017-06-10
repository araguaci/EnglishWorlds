<?php

namespace English\Models;

use English\Models\Role;
use English\Models\Team;
use English\Models\UserMeta;
use English\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function getName()
    {
        if ($this->name) {
            return "{$this->name}";
        }
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->name;
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('English\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('English\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function statuses()
    {
        return $this->hasMany('English\Models\Status', 'user_id');
    }

    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

    public function friendRequestPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hadFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }
    /**
     * User UserMeta
     *
     * @return Relationship
     */
    public function meta()
    {
        return $this->hasOne(UserMeta::class);
    }

    /**
     * User Roles
     *
     * @return Relationship
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if user has role
     *
     * @param  string  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        $roles = array_column($this->roles->toArray(), 'name');
        return array_search($role, $roles) > -1;
    }

    /**
     * Check if user has permission
     *
     * @param  string  $permission
     * @return boolean
     */
    public function hasPermission($permission)
    {
        return $this->roles->each(function ($role) use ($permission) {
            if (in_array($permission, explode(',', $role->permissions))) {
                return true;
            }
        });

        return false;
    }

    /**
     * Teams
     *
     * @return Relationship
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Team member
     *
     * @return boolean
     */
    public function isTeamMember($id)
    {
        $teams = array_column($this->teams->toArray(), 'id');
        return array_search($id, $teams) > -1;
    }

    /**
     * Team admin
     *
     * @return boolean
     */
    public function isTeamAdmin($id)
    {
        $team = $this->teams->find($id);

        if ($team) {
            return (int) $team->user_id === (int) $this->id;
        }

        return false;
    }

    /**
     * Find by Email
     *
     * @param  string $email
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
