<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Filters;

use Flume\FlumePhp\Compilers\IFilterExpressionCompiler;

class LessOrEqualFilter implements IFilter
{
    public function __construct(
        public string $field,
        public int|float|bool|string $value
    ) {

    }

    public function compileExpressionVia(IFilterExpressionCompiler $compiler): string
    {
        return $compiler->compileLessOrEqualFilter($this);
    }
}
