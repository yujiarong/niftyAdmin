<?php

namespace App\Listeners\Auth;
use Laravel\Passport\Token;
use Laravel\Passport\Events\AccessTokenCreated;

class RevokeOldTokens
{

    /**
     * Handle the event.
     *
     * @param  AccessTokenCreated  $event
     * @return void
     */
    public function handle(AccessTokenCreated $event)
    {
        Token::where('id', '!=', $event->tokenId)
            ->where('user_id', $event->userId)
            ->where('client_id', $event->clientId)
            ->where('expires_at', '<', now())
            ->orWhere('revoked', true)
            ->delete();
    }

}
