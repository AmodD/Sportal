<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *  Determine if the given post can be updated by the user.
     *  @param  \App\User  $user
     *	@return bool
     *	*/
     
	public function superAdmin(User $user)
	{
		return $user->id === 1;
	}

}
