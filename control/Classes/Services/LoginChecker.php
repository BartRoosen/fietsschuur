<?php

namespace Classes\Services;

use Classes\Entities\User;
use Classes\Entities\UserRepository;

class LoginChecker
{
    /**
     * @var User
     */
    private $user;

    /**
     * LoginChecker constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     *
     */
    public function checkCredentials()
    {
        $userRepo       = new UserRepository();
        $sessionService = new SessionService();

        $sessionService->writeToSession(
            [
                $sessionService::KEY_LOGIN => $userRepo->findUser($this)[0]['isUser'],
                $sessionService::KEY_USER  => $this->getUser()->getUserName(),
                $sessionService::KEY_PAGE  => 'home',
            ]
        );
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
