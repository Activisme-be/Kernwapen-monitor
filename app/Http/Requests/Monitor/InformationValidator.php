<?php

namespace App\Http\Requests\Monitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InformationValidator 
 * 
 * @package App\Http\Requests\Monitor
 */
class InformationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // No authorization check needed because a check already happen 
        // In the controller. Thats why we set it to true. 

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'naam'      => ['required', 'string'], 
            'province'  => ['required', 'integer'],
            'lat'       => ['required', 'string'],
            'lng'       => ['required', 'string']
        ];
    }
}
