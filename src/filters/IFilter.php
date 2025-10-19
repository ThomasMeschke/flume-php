<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Filters;

use Flume\FlumePhp\Compilers\IFilterExpressionCompiler;

interface IFilter
{
    public function compileExpressionVia(IFilterExpressionCompiler $compiler): string;
}
