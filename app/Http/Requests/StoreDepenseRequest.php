<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'colocation_id' => 'required|exists:colocations,id',
            'title'         => 'required|string|min:3|max:255',
            'amount'        => 'required|numeric|min:0.01',
            'user_id'       => 'required|exists:users,id',
            'category_id'   => 'nullable|exists:categories,id',
            'spent_at'      => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Donne un titre à cette dépense',
            'title.min' => 'Le titre doit faire au moins 3 caractères',
            'amount.min' => 'Le montant doit être d\'au moins 0,01 €',
            'spent_at.required' => 'La date est obligatoire',
        ];
    }
}