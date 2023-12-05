<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\History;

class DefaultEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        return $model->eventText;
    }
}
