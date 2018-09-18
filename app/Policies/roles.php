<?php

namespace App\Policies;

use App\User;
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
    public function admin_only(User $user){

        if($user->role == "Admin")
        {
            return true;
        }
        return false;
    }
}
