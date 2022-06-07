<?php

namespace App\Interfaces;

interface WordsBag
{

    public function load(...$args): void;

    public function get_bag(): array;

}