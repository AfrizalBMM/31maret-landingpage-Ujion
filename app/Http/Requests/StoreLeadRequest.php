<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'max:120'],
      'phone' => ['required', 'string', 'max:30'],
      'email' => ['nullable', 'email', 'max:120'],
      'school_name' => ['required', 'string', 'max:160'],
      'role' => ['required', 'string', 'max:80'],
      'message' => ['nullable', 'string', 'max:600'],
      'cta_variant' => ['required', 'string', 'in:Coba Demo Gratis,Jadwalkan Presentasi,Mulai Sekarang'],
    ];
  }
}
