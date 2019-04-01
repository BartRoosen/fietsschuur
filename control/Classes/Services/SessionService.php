<?php

namespace Classes\Services;

class SessionService
{
    const SESSION_EXPIRE = 1800;
    const KEY_LOGIN = 'login';
    const KEY_USER  = 'user';
    const KEY_PAGE  = 'page';

    /**
     * @var array
     */
    private $validKeys = [
        self::KEY_LOGIN,
        self::KEY_USER,
        self::KEY_PAGE,
    ];

    /**
     *
     */
    private function start()
    {
        $this->sendTheGarbageMan();
        
        if (!isset($_SESSION)) {
            ini_set('session.save_path',getcwd(). '/session');
            session_start();
        }

        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > self::SESSION_EXPIRE)) {
            session_unset();
            session_destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
        session_regenerate_id(true);
    }

    private function sendTheGarbageMan()
    {
        $path = "session";
        $arr_files = scandir($path);
        foreach ($arr_files as $file) {
            if($file != "." && $file != ".." && $file != '.htaccess'){

                if (filemtime($path . "/" . $file) < time() - self::SESSION_EXPIRE){
                    unlink($path . "/" . $file);
                }
            }
        }
    }

    /**
     * @param $key
     *
     * @return bool
     */
    private function isValidKey($key)
    {
        if (in_array($key, $this->validKeys)) {
            return true;
        }

        return false;
    }

    /**
     * @param array $array
     */
    public function writeToSession(array $array)
    {
        $this->start();
        foreach ($array as $key => $value) {
            if ($this->isValidKey($key)) {
                $_SESSION[$key] = $value;
            }
        }
    }

    /**
     * @param null $key
     *
     * @return bool|string
     */
    public function readFromSession($key = null)
    {
        $this->start();

        if (null === $key) {
            return $_SESSION;
        }

        if ($this->isValidKey($key) && array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }

        return false;
    }

    /**
     *
     */
    public function clearSession()
    {
        $this->start();
        session_destroy();
    }

    /**
     * @return bool
     */
    public function isUserLogedIn()
    {
        $this->start();

        return (bool) $this->readFromSession(self::KEY_LOGIN);
    }
}
