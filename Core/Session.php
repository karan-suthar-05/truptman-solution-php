<?php

namespace Core;

class Session
{
    public static function flashErrors(array $value): void
    {
        $_SESSION["_flash"]["errors"] = $value;
    }
    public static function flash(string $key,string $value): void
    {
        $_SESSION["_flash"][$key] = $value;
    }
    public static function unflash(): void
    {
        unset($_SESSION["_flash"]);   
        $_SESSION["_flash"] = [];
    }
    public static function get(string $key): string
    {
        return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? "";
    }
    public static function getErrors()
    {
        return $_SESSION["_flash"]["errors"] ?? $_SESSION["errors"] ?? "";
    }
}