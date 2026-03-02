<?php

namespace common\Exceptions;

use Yii;

class EmptyBodyRequestException extends AbstractException
{
    public static function create()
    {
        return new self(Yii::t('app', 'Не переданы параметры в теле запроса'));
    }
}
