<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PostValidator 
 * 
 * @package App\Http\Requests\Articles
 */
class PostValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Geen authorizatie check nodig omdat deze al gebeurd in de controller. 
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
            //
        ];
    }
}
