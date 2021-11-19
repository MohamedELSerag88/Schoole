<?php

namespace App\Http\Requests;

use App\Http\Requests\ResponseShape;

class StudentRequest extends ResponseShape
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name'          => 'required|min:2',
                        'age'         => 'required|numeric|min:6|max:18',
                        'grade'      => 'required',
                        'schoole_id'      => 'nullable|exists:schooles,id',
                    ];
                }
            case 'PUT': {
                    return [
                        'name'          => 'required|min:2',
                        'age'         => 'required|numeric|min:6|max:18',
                        'grade'      => 'required',
                        'schoole_id'      => 'nullable|exists:schooles,id',
                    ];
                }
            default:
                break;
        }
    }
}
