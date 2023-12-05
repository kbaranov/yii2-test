<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\History;

class TaskEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        $task = $model->task;
        return "$model->eventText: " . ($task->title ?? '');
    }
}
