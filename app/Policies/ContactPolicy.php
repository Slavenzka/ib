<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the contact.
     *
     * @param User $user
     * @param Contact $contact
     * @return mixed
     */
    public function delete(User $user, Contact $contact)
    {
        return $user->hasRole('admin');
    }
}
