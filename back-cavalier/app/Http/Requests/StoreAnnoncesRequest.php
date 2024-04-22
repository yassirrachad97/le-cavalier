<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnoncesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

                'title' => 'required|string',
                'description' => 'required|string',
                'phone_appel' => 'required|string',
                'phone_wathsapp' => 'nullable|string',
                'cover' => 'required|file',
                'city_id' => 'required|exists:cities,id',
                'price' => 'required|numeric|min:0',
                'horse_id' => 'nullable|exists:horses,id',
                'accessoire_id' => 'nullable|exists:accessoires,id',
                'horse_name' => 'nullable|string',
                'horse_age' => 'nullable|numeric',
                'horse_color' => 'nullable|string',
                'horse_pedigree' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'accessoire_type' => 'nullable|string',
                'accessoire_name' => 'nullable|string',
    

        ];
    }
}
