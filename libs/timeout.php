<?php

require_once(LIBS . '/session.php');

class Timeout
{

    function __construct()
    {
        $this->session = new Session();
    }

    public function checkUserTime()
    {
        $this->session->init();

        if (empty($this->session->get('timeout'))) {
            return true;
        }

        $timeOut = $this->session->get('timeout');
        if ((time() - $timeOut) > 3600) {
            return true;
        }
    }
}
