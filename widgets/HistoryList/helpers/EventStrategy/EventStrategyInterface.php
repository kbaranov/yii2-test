<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\History;

interface EventStrategyInterface
{
    public function getBody(History $model): string;
}
