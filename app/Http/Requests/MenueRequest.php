<?php

namespace App\Http\Requests;

use App\Rules\RestoCategryValidate;
use Illuminate\Foundation\Http\FormRequest;

class MenueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'resturant_id'  =>  'required|numeric',
            'price'         =>  'required|numeric',
            'item'          =>  'required',
            'description'   =>  'required',
            'category'      =>  ['required'],//new RestoCategryValidate(request('resturant_id'))
        ];
    }
}
