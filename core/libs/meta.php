<?php
class Meta
{
    public static function getCurrentController()
    {
        $context = debug_backtrace(false)[2];
        return strtolower(explode("Controller", $context['class'])[0]);
    }

    public static function getCurrentAction()
    {
        $context = debug_backtrace(false)[2];
        return strtolower($context['function']);
    }

    public static function getParams()
    {
        $context = debug_backtrace(false)[2];
        return $context['args'];
    }
}
