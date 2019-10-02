<?php

namespace Queue;

use Throwable;

class QueueEmptyException extends \UnderflowException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?? 'Queue is empty!', $code, $previous);
    }
}
