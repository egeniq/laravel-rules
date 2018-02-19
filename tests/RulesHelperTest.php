<?php

namespace Egeniq\Laravel\Rules\Test;

use Illuminate\Validation\Rule;
use Orchestra\Testbench\TestCase;
use Egeniq\Laravel\Rules\RulesServiceProvider;

class TestRule extends Rule
{
}

class RulesHelperTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [RulesServiceProvider::class];
    }

    public function testRulesHelperIsAvailable()
    {
        $this->assertTrue(function_exists('rules'));
    }

    public function testRulesFunctionParsesCorrectly()
    {
        $testRule = new TestRule();

        $this->assertEquals(
            ['required', 'integer', $testRule, 'foobar'],
            rules('required|integer', $testRule, 'foobar')
        );
    }

    public function testSupportsClosureRules()
    {
        $testClosure = function ($attribute, $value, $fail) {
            return $fail($attribute.' is invalid.');
        };

        $this->assertEquals([$testClosure], rules($testClosure));
    }
}
