<?php

namespace app\widgets\HistoryList\helpers;

use app\models\History;
use app\widgets\HistoryList\helpers\EventStrategy\DefaultEventStrategy;
use app\widgets\HistoryList\helpers\EventStrategy\EventStrategyInterface;

class HistoryListHelper
{
    public static function getBodyByModel(History $model): string
    {
        $strategy = self::getStrategy($model->event->strategy);
        $context = new EventContext($strategy);
        return $context->getBody($model);
    }

    private static function getStrategy(string $strategy): EventStrategyInterface
    {
        $className = 'app\\widgets\\HistoryList\\helpers\\EventStrategy\\'
            . implode('', array_map('ucfirst', explode('_', $strategy))) . 'EventStrategy';

        return class_exists($className) ? new $className() : new DefaultEventStrategy();
    }
}