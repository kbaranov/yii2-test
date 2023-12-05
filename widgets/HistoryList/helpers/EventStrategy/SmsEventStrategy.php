<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\History;

class SmsEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        return $model->sms->message ? $model->sms->message : '';
    }
}
