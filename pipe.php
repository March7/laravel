<?php
//laravel 处理管道

interface Middleware
{
    public static function handle(Closure $next);
}

class VerifyCsrfToken implements Middleware
{
    public static function handle(Closure $next)
    {
        echo "Verify Token.".'<br>';
        $next();
    }
}

class EncryptCookies implements Middleware
{
    public static function handle(Closure $next)
    {
        echo "Encrypt Input Cookies".'<br>';
        $next();
        echo "Encrypt Output Cookies".'<br>';
    }
}

function getSlice()
{
    return function ($stack, $pipe)
    {
        return function() use ($stack, $pipe)
        {
            return $pipe::handle($stack);
        };
    };
}

function then()
{
    $pipes = ["EncryptCookies","VerifyCsrfToken"];

    $firstSlice = function(){
        echo "request and response.".'<br>';
    };

    call_user_func(
        array_reduce($pipes, getSlice(), $firstSlice)
    );
}

then();
 
?>