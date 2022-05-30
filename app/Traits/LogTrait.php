<?php


namespace App\Traits;

use Illuminate\Support\Facades\Log;

/**
 * Trait LogTrait
 * @package App\Traits
 */
trait LogTrait
{
    /**
     * Log errors
     * @param \Exception $exception
     */
    public function log(\Exception $exception)
    {
        Log::info($exception->getMessage(), [
            'File: ' => $exception->getFile(),
            'Line: ' => $exception->getLine(),
            'Cole: ' => $exception->getCode()
        ]);
    }
}
