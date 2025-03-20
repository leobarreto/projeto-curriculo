<?php

namespace App\Http\Requests;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'cpf' => 'required|string|size:14|unique:curriculos',
            'data_nascimento' => 'required|date_format:d/m/Y',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'escolaridade' => 'required',
            'pretensao_salarial' => 'required|numeric',
        ];
    }
}
