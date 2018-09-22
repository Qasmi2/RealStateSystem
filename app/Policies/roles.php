<?php

namespace App\Policies;

use App\User;
use App\approval;
use Illuminate\Auth\Access\HandlesAuthorization;

class roles
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    // Admin Actions
    public function admin_only(User $user){

        if($user->role == "Admin")
        {
            return true;
        }
        return false;
    }
    // financial Office's Actions 
    public function financial_only(User $user){

        if($user->role == "Financial Officer")
        {
            return true;
        }
        return false;
    }

    public function user_actions(User $user){

        if( $user->role == "Admin" || $user->role == "Financial Officer")
        {
            return true;
        }
        return false;
    }
}
