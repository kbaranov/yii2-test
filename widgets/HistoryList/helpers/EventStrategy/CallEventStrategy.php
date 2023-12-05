<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\History;

class CallEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        $call = $model->call;
        return ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
    }
}
