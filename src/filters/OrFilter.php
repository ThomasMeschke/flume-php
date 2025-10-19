<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Filters;

use Flume\FlumePhp\Compilers\IFilterExpressionCompiler;

class OrFilter implements IFilter
{
    public function __construct(public IFilter $lhs, public IFilter $rhs)
    {

    }

    public function compileExpressionVia(IFilterExpressionCompiler $compiler): string
    {
        return $compiler->compileOrFilter($this);
    }
}
