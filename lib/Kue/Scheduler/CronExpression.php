<?php

namespace Kue\Scheduler;

use Cron\BaseCronExpression;

class CronExpression implements Expression
{
    protected $expression;

    function __construct($expression)
    {
        $this->expression = BaseCronExpression::factory($expression);
    }

    function getNextRunDate($currentTime = 'now')
    {
        return $this->expression->getNextRunDate($currentTime, 0, false);
    }

    function isDue(\DateTime $currentTime = null)
    {
        return $this->expression->isDue($currentTime);
    }
}
