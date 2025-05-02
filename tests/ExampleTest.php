<?php

uses(LaravelMpdf\Tests\TestCase::class);

test('example', function () {
    $result = 1 + 2;
    expect($result)->toBe(3);

    something();
});
