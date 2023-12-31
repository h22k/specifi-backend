<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'created_by'  => 'sometimes|exists:users,id',
            'assigned_to' => 'sometimes|exists:users,id',
            'title'       => 'sometimes|string|min:1|max:255',
            'description' => 'sometimes|string|min:1|max:1000',
            'progress'    => 'sometimes|string|in:to_do,in_progress,need_review,done',
            'category_id' => 'sometimes|exists:task_categories,id',
        ];
    }
}
