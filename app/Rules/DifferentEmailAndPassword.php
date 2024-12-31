<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DifferentEmailAndPassword implements ValidationRule
{
    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === $this->password) {
            $fail('The :attribute must not be the same as the password.');
        }
    }
}
