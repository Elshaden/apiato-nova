<?php

namespace App\Containers\AppSection\User\Observers;

use App\Containers\AppSection\User\Models\User;
use App\Containers\Vendor\Sanctum\Actions\UpdateSanctumAction;
use App\Containers\Vendor\Sanctum\Notifications\ReIssueuserToken;
use App\Containers\Vendor\Sanctum\UI\API\Requests\UpdateSanctumRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        Log::info('UserCreated');
       $token = $user->createToken(Str::slug(strtolower($user->name)))->plainTextToken;
        $token = explode('|', $token);
        $token = $token[1];
        $token_id = $token[0];
        $user->notify(new ReIssueuserToken($token));
    }
    /**
     * Handle the User "updated" event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
