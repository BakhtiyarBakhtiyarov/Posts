<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
                'resume_resume_type'             => 'required',
                'resume_start_date'             => 'required',
                'resume_end_date'             => 'required',
                'resume_title'             => 'required',
                'resume_description'             => 'required'
        ];
    }
}
