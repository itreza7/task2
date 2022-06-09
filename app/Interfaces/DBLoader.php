<?php

namespace App\Interfaces;

interface DBLoader
{

    public function load(...$args): void;

    public function exists($string): bool;

    public function get_class($string): array;

    public function get_classes(): array;

}