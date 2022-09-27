<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactShowRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'contact_id'  => 'required|string|max:40|exists:contacts,id'
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        $data = parent::all();
        $data['contact_id'] = $this->route('contact');

        return $data;
    }
}
