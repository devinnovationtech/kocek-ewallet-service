<?php

namespace App\Internal\Exceptions;

use InvalidArgumentException;

final class TransactionRollbackException extends InvalidArgumentException implements ExceptionInterface
{
    public function __construct(
        private readonly mixed $result
    ) {
        parent::__construct();
    }

    public function getResult(): mixed
    {
        return $this->result;
    }
}