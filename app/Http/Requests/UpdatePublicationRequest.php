<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePublicationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentYear = (int) date('Y');

        return [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'publisher' => ['required', 'string', 'min:3', 'max:150'],
            'year' => ['required', 'integer', 'min:1980', 'max:'.$currentYear],
            'citation_count' => ['nullable', 'integer', 'min:0'],
            'url' => ['nullable', 'url', 'max:255', 'active_url'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'Judul publikasi',
            'publisher' => 'Nama jurnal / konferensi / penerbit',
            'year' => 'Tahun terbit',
            'citation_count' => 'Jumlah kutipan',
            'url' => 'Tautan artikel',
        ];
    }

    /**
     * Get custom error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'title.min' => ':attribute minimal 5 karakter.',
            'title.max' => ':attribute maksimal 255 karakter.',
            'publisher.min' => ':attribute minimal 3 karakter.',
            'publisher.max' => ':attribute maksimal 150 karakter.',
            'year.integer' => ':attribute harus berupa angka tahun yang valid.',
            'year.min' => ':attribute tidak boleh lebih lama dari tahun 1980.',
            'year.max' => ':attribute tidak boleh melebihi tahun berjalan (:max).',
            'citation_count.integer' => ':attribute harus berupa bilangan bulat positif atau nol.',
            'citation_count.min' => ':attribute tidak boleh bernilai negatif.',
            'url.url' => ':attribute harus berupa format URL yang valid (contoh: https://...).',
            'url.active_url' => ':attribute bukan merupakan domain atau tautan yang aktif / dapat dijangkau.',
            'url.max' => ':attribute maksimal 255 karakter.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('citation_count') && $this->input('citation_count') === null) {
            $this->merge(['citation_count' => 0]);
        }
    }
}
