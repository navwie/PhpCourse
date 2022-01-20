<?php

namespace Framework\core;

use Exception;

/**
 * Class ErrorHandler
 */
class ErrorHandler extends Exception
{
    public function register()
    {
        ini_set('display_errors', 'on');
        error_reporting(E_ALL | E_STRICT);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $file
     * @param $line
     * @return bool
     */
    public function errorHandler($errno, $errstr, $file, $line)
    {
        $log = ("[" . date('Y-m-d H:i:s') . "] Текст ошибки: $errstr | Файл: $file
        | Строка: $line \n ======================================\n");
        file_put_contents(__DIR__ . '/errors.log', $log, FILE_APPEND);
        $this->showError($errno, $errstr, $file, $line);
        return true;
    }

    public static function getErrorName($error)
    {
        $errors = [
            E_ERROR => 'ERROR',
            E_WARNING => 'WARNING',
            E_PARSE => 'PARSE',
            E_NOTICE => 'NOTICE',
            E_CORE_ERROR => 'CORE_ERROR',
            E_CORE_WARNING => 'CORE_WARNING',
            E_COMPILE_ERROR => 'COMPILE_ERROR',
            E_COMPILE_WARNING => 'COMPILE_WARNING',
            E_USER_ERROR => 'USER_ERROR',
            E_USER_WARNING => 'USER_WARNING',
            E_USER_NOTICE => 'USER_NOTICE',
            E_STRICT => 'STRICT',
            E_RECOVERABLE_ERROR => 'RECOVERABLE_ERROR',
            E_DEPRECATED => 'DEPRECATED',
            E_USER_DEPRECATED => 'USER_DEPRECATED',
        ];
        if (array_key_exists($error, $errors)) {
            return $errors[$error] . " [$error]";
        }
        return $error;
    }

    /*
    * @param \Exception $e
     *
    */

    /**
     * @param  $error
     * @return string
     */

    public function exceptionHandler($exception)
    {
        $this->showError(get_class($exception), $exception->getMessage(), $exception->getFile(), $exception->getLine());

        $log = ("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$exception->getMessage()} | Файл: {$exception->getFile()} 
        | Строка: {$exception->getLine()} \n ======================================\n");
        file_put_contents(__DIR__ . '/errors.log', $log, FILE_APPEND);
        return true;
    }

    public function fatalErrorHandler()
    {
        if ($error = error_get_last() and $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            ob_end_clean();
            $this->showError($error['type'], $error['message'], $error['file'], $error['line'], 500);
            $log = ("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$error['message']} | Файл: {$error['file']} 
        | Строка: {$error['line']} \n ======================================\n");
            file_put_contents(__DIR__ . '/errors.log', $log, FILE_APPEND);
            return true;
        } else {
            ob_end_flush();
        }
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $file
     * @param $line
     * @param $status
     */
    public function showError(
        $errno,
        $errstr,
        $file,
        $line,
        $status = 500
    )
    {
        header("HTTP/1.1 $status");
        echo $message = '<b>' . self::getErrorName($errno)
            . '<hr>' . $errstr . '<hr> file: ' . $file . '<hr> line: ' . $line . '<hr>';
    }
}
