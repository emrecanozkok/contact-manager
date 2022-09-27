<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInformationDeleteRequest extends FormRequest
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
            'contact_id'  => 'required|string|max:40|exists:contacts,id',
            'information_id'  => 'required|string|max:40',
        ];
    }



    /**
     * @return array
     */
    public function validationData()
    {
        $data = parent::all();
        $data['contact_id'] = $this->route('contact');
        $data['information_id'] = $this->route('information');

        return $data;
    }
}
