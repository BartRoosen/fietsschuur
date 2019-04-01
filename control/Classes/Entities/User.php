<?php

namespace Classes\Entities;

class User
{
    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $password;

    /**
     * User constructor.
     *
     * @param array $postArray
     */
    public function __construct(array $postArray)
    {
        if (isset($postArray['name']) && isset($postArray['pwd'])) {
            $this->userName = $postArray['name'];
            $this->password = $postArray['pwd'];
        }
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
