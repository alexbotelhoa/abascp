<?php

namespace SCP\Control;

class Message
{
    const ERROR = "MsgError";
    const SUCCESS = "MsgSuccess";

    public static function setError($msg)
    {
        $_SESSION[Message::ERROR] = $msg;

        return $msg;
    }

    public static function getError()
    {
        $msg = (isset($_SESSION[Message::ERROR]) && $_SESSION[Message::ERROR]) ? $_SESSION[Message::ERROR] : "";

        Message::clearError();

        return $msg;
    }

    public static function clearError()
    {
        return $_SESSION[Message::ERROR] = null;
    }

    public static function setSuccess($msg)
    {
        $_SESSION[Message::SUCCESS] = $msg;

        return $msg;
    }

    public static function getSuccess()
    {
        $msg = (isset($_SESSION[Message::SUCCESS]) && $_SESSION[Message::SUCCESS]) ? $_SESSION[Message::SUCCESS] : "";

        Message::clearSuccess();

        return $msg;
    }

    public static function clearSuccess()
    {
        return $_SESSION[Message::SUCCESS] = null;
    }
}