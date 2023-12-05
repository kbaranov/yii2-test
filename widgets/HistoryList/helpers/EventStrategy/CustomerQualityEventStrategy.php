<?php

namespace app\widgets\HistoryList\helpers\EventStrategy;

use app\models\Customer;
use app\models\History;

class CustomerQualityEventStrategy implements EventStrategyInterface
{
    public function getBody(History $model): string
    {
        return "$model->eventText " .
            (Customer::getQualityTextByQuality($model->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($model->getDetailNewValue('quality')) ?? "not set");
    }
}
