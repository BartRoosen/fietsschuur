<?php

namespace Classes\Entities;

use Classes\Services\LoginChecker;

class UserRepository extends AbstractRepository
{
    /**
     * @param LoginChecker $loginChecker
     *
     * @return array
     */
    public function findUser(LoginChecker $loginChecker)
    {
        $user  = $loginChecker->getUser();
        $binds = [
            'USERNAME' => $user->getUserName(),
            'HASH'     => $this->constructHash($user),
        ];

        $sql = 'SELECT COUNT(AI_USER) AS isUser
                FROM users
                WHERE NM_USER = :USERNAME AND CD_HASH = :HASH AND FL_DELETED = 0;';

        return $this->fetchAll($sql, $binds);
    }

    /**
     * @param User $user
     *
     * @return string
     */
    private function constructHash(User $user)
    {
        $test = sha1(sprintf('%s%s', $user->getUserName(), $user->getPassword()));
        return $test;
    }
}