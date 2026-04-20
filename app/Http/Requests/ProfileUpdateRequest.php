<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->user();
        $esAdmin = $user && ($user->is_admin ?? false);
        
        // Campos que cualquier usuario puede editar
        $rules = [
            'fecha_nacimiento' => ['nullable', 'date'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'localidad' => ['nullable', 'string', 'max:255'],
            'observaciones_medicas' => ['nullable', 'string'],
        ];
        
        if ($esAdmin) {
            // Admin puede editar todo
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['apellidos'] = ['nullable', 'string', 'max:255'];
            $rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)];
            $rules['telefono'] = ['nullable', 'string', 'max:20'];
        } else {
            // Usuario normal: estos campos son obligatorios pero readonly
            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['apellidos'] = ['nullable', 'string', 'max:255'];
            $rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)];
            $rules['telefono'] = ['nullable', 'string', 'max:20'];
        }
        
        return $rules;
    }
}
