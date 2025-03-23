<?php

namespace App\Http\Requests;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CurriculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            Rule::unique('curriculos')->ignore($this->route('curriculo')),
            'data_nascimento' => 'required|date_format:d/m/Y',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'escolaridade' => 'required',
            'pretensao_salarial' => 'required|numeric',
        ];
    }
}
