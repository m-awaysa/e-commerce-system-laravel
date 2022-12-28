<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class arrayValidation implements Rule
{


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $values)
    {
       
        foreach($values as $value)
        {
         //   dd(strlen($value));
           return strlen($value) >= 5 && strlen($value) < 255;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Feature name must
        * contain just character,number or dashes. 
        * minimum 1 character.
        * maximum 255 character.';
    }
}
