<?php
class ErrorController extends Controller
{

    function index($message)
    {
        $this->view(['message' => $message], false);
    }
}
