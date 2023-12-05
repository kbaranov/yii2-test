<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\Customer;
use app\models\History;

class CustomerTypeEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        return "$model->eventText " .
            (Customer::getTypeTextByType($model->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($model->getDetailNewValue('type')) ?? "not set");
    }
}
