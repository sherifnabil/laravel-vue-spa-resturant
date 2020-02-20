<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class RestoCategryValidate implements Rule
{
    private $resturant_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($resturant_id)
    {
        $this->resturant_id = $resturant_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(Category::where('name', $value)->where('resturant_id', $this->resturant_id)->first()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Category for this Resturant Doesn\'t exist.';
    }
}
