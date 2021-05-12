<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateJobRequest extends FormRequest
{
    public function rules()
    {
        return [
            'job_title'     => [
                'string',
                'required',
            ],
            'job_desc'    => [
                'required',
                'string'
            ],
            'job_expiry_date'    => [
                'required',
                'date_format:Y-m-d'
            ],
            'company_address'    => [
                'required',
                'string'
            ],
            'job_type'    => [
                'required',
                'string'
            ],
            'min_salary'    => [
                'required',
                'integer'
            ],
            'max_salary'    => [
                'required',
                'integer'
            ],
            'category_id'    => [
                'required',
                'integer'
            ],
            'job_qualification'    => [
                'required',
                'string'
            ],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
