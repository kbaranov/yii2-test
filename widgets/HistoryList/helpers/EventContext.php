<?php

namespace app\widgets\HistoryList\helpers;

use app\models\History;
use app\widgets\HistoryList\helpers\EventStrategy\EventStrategyInterface;

class EventContext
{
    private $strategy;

    public function __construct(EventStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getBody(History $model): string
    {
        return $this->strategy->getBody($model);
    }
}