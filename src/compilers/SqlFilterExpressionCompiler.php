<?php

declare(strict_types=1);

namespace Flume\FlumePhp\Compilers;

use DateTimeInterface;
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

class SqlFilterExpressionCompiler implements IFilterExpressionCompiler
{
    public function compile(IFilter $filter): string
    {
        return $filter->compileExpressionVia($this);
    }

    public function compileAndFilter(AndFilter $filter): string
    {
        $lhs = $this->compile($filter->lhs);
        $rhs = $this->compile($filter->rhs);

        return "({$lhs}) AND ({$rhs})";
    }

    public function compileDateBetweenFilter(DateBetweenFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $from = $this->stringifyValue($filter->inclusiveStartDate);
        $to = $this->stringifyValue($filter->inclusiveEndDate);

        return "{$field} BETWEEN {$from} AND {$to}";
    }

    public function compileEqualityFilter(EqualityFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} = {$value}";
    }

    public function compileGreaterOrEqualFilter(GreaterOrEqualFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} >= {$value}";
    }

    public function compileGreaterThanFilter(GreaterThanFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} > {$value}";
    }

    public function compileInequalityFilter(InequalityFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} <> {$value}";
    }

    public function compileIsNoneOfFilter(IsNoneOfFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $values = array_map(function ($value) {
            return $this->stringifyValue($value);
        }, $filter->values);
        $valueCollection = join(',', $values);

        return "{$field} NOT IN ({$valueCollection})";
    }

    public function compileIsOneOfFilter(IsOneOfFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $values = array_map(function ($value) {
            return $this->stringifyValue($value);
        }, $filter->values);
        $valueCollection = join(',', $values);

        return "{$field} IN ({$valueCollection})";
    }

    public function compileLessOrEqualFilter(LessOrEqualFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} <= {$value}";
    }

    public function compileLessThanFilter(LessThanFilter $filter): string
    {
        $field = $this->stringifyField($filter->field);
        $value = $this->stringifyValue($filter->value);

        return "{$field} < {$value}";
    }

    public function compileOrFilter(OrFilter $filter): string
    {
        $lhs = $this->compile($filter->lhs);
        $rhs = $this->compile($filter->rhs);

        return "({$lhs}) OR ({$rhs})";
    }

    private function stringifyValue(int|float|bool|string|DateTimeInterface $value): string
    {
        if (is_string($value)) {
            return "'{$value}'";
        }
        if ($value instanceof DateTimeInterface) {
            return $this->stringifyValue($value->format('Y-m-d'));
        }
        return (string)$value;
    }

    private function stringifyField(string $field): string
    {
        return "`{$field}`";
    }
}
