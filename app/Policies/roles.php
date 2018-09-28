<?php

namespace App\Policies;

use App\User;
use App\property;
use App\approval;
use Illuminate\Http\Request;
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
    /**
     * Create a new policy function only for Admin.
     *
     * @return true/false
     */
    public function admin_only(User $user){

        if($user->role == "Admin")
        {
            return true;
        }
        return false;
    }
    /**
     * Create a new policy function financial Office's Actions.
     *
     * @return true/false
     */
    public function financial_only(User $user){

        if($user->role == "Financial Officer")
        {
            return true;
        }
        return false;
    }
     /**
     * Create a new policy function function user actions.
     *
     * @return true/false
     */

    public function user_actions(User $user){

        if( $user->role == "Admin" || $user->role == "Financial Officer")
        {
            return true;
        }
        return false;
    }
    /**
     * Create a new policy function single view .
     *
     * @return true/false
     */
    public function view_single(User $user, property $property)
    {
        if($user->role == "Admin" || $user->role == "Financial Officer" || $user->id == $property->userId)
        {
            return true;
        }
        return false;
       
    }
    /**
     * Create a new policy function create form .
     *
     * @return true/false
     */
    public function  create_form(User $user)
    {
        if($user->role != "Financial Officer" )
        {
            return true;
        }
        return false;
       
    }
     /**
     * Create a new policy function delete .
     *
     * @return true/false
     */
    public function delete_form(User $user, approval $approval)
    {
        
        if($approval->status != "approved")
        {
            return true;
        }
        return false;
       
    }
 
   
}
