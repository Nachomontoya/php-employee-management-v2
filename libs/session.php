<?php

class Session
{

  public function init()
  {
    if ($this->getStatus() !== PHP_SESSION_ACTIVE)
      session_start();
  }

  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  public function getAll()
  {
    return $_SESSION;
  }

  public function remove($key)
  {
    if (!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }

  public function close()
  {
    session_unset();
    session_destroy();
    $this->destroyCookies();
  }

  function destroyCookies()
  {
    if (ini_get('session.use_cookies')) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"],
      );
    }
  }

  public function getStatus()
  {
    return session_status();
  }
}
