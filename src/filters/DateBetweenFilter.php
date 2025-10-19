<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Filters;

use DateTimeInterface;
use Flume\FlumePhp\Compilers\IFilterExpressionCompiler;

class DateBetweenFilter implements IFilter
{
    public function __construct(
        public string $field,
        public DateTimeInterface $inclusiveStartDate,
        public DateTimeInterface $inclusiveEndDate
    ) {

    }

    public function compileExpressionVia(IFilterExpressionCompiler $compiler): string
    {
        return $compiler->compileDateBetweenFilter($this);
    }
}
