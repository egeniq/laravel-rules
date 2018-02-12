<?php

if (function_exists('rules')) {
    return;
}

function rules(...$rules)
{
    $result = [];
    foreach ($rules as $rule) {
        if (is_string($rule)) {
            $result = array_merge($result, explode('|', $rule));
        } elseif (is_object($rule)) {
            $result[] = $rule;
        }
    }

    return array_values($result);
}
