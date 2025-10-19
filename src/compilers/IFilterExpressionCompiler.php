<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Compilers;

use Flume\FlumePhp\Filters\IFilter;
use Flume\FlumePhp\Filters\{
    AndFilter,
    DateBetweenFilter,
    EqualityFilter,
    GreaterOrEqualFilter,
    GreaterThanFilter,
    InequalityFilter,
    IsNoneOfFilter,
    IsOneOfFilter,
    LessOrEqualFilter,
    LessThanFilter,
    OrFilter,
};

interface IFilterExpressionCompiler
{
    public function compile(IFilter $filter): string;

    public function compileEqualityFilter(EqualityFilter $filter): string;
    public function compileInequalityFilter(InequalityFilter $filter): string;
    public function compileGreaterThanFilter(GreaterThanFilter $filter): string;
    public function compileGreaterOrEqualFilter(GreaterOrEqualFilter $filter): string;
    public function compileLessThanFilter(LessThanFilter $filter): string;
    public function compileLessOrEqualFilter(LessOrEqualFilter $filter): string;
    public function compileDateBetweenFilter(DateBetweenFilter $filter): string;
    public function compileIsOneOfFilter(IsOneOfFilter $filter): string;
    public function compileIsNoneOfFilter(IsNoneOfFilter $filter): string;
    public function compileAndFilter(AndFilter $filter): string;
    public function compileOrFilter(OrFilter $filter): string;
}
