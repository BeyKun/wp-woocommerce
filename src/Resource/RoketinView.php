<?php

class RoketinView
{
    function view($page)
    {
        switch($page)
        {
            case 'dashboard':
                include_once(__DIR__ . '/views/dashboard.html');
                break;
            case 'setting':
                include_once(__DIR__ . '/views/setting.html');
                break;
            default: '<h1>Hello Astronaut!</h1>';
        }
    }

    function hello(){
        echo "<h1>HALOOOOOOOOOOOOO</h1>";
    }
}