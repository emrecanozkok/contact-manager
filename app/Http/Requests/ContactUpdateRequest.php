<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'contact_id'  => 'required|string|max:40',
            "name"  => "required|min:2|max:255",
            "last_name"=> "required|min:2|max:255",
            "company"=> "required|min:2|max:255",
            "photo_url" => "required|url",
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
