<?php

namespace common\Exceptions;

use Exception;

abstract class AbstractException extends Exception
{
    /** Массив ошибок, например ошибки валидации */
    private array $errors = [];

    /** Статус-код, по умолчанию === Http коду, но возможна кастомизация в будущем */
    private int $statusCode;

    /** Сквозной идентификатор запроса - нужно для трассировки запросов между микросервисами */
    private ?string $traceId = null;

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getTraceId(): ?string
    {
        return $this->traceId;
    }

    public function setTraceId(?string $traceId): AbstractException
    {
        $this->traceId = $traceId;

        return $this;
    }
}
