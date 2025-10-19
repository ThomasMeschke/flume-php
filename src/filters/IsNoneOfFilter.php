<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Filters;

use Flume\FlumePhp\Compilers\IFilterExpressionCompiler;

class IsNoneOfFilter implements IFilter
{
    public string $field;
    /** @var array<float|int|string> $values*/
    public array $values = [];

    public function __construct(string $field, float|int|string ...$values)
    {
        $this->field = $field;
        $this->values = $values;
    }

    public function compileExpressionVia(IFilterExpressionCompiler $compiler): string
    {
        return $compiler->compileIsNoneOfFilter($this);
    }
}
