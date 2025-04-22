<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 
                'string',   
                'max:255',  
            ],
            'location_id' => [
                'required', // This field is now required
                'integer', // Ensure it's an integer
                'exists:locations,id', // Ensure the location exists
            ],
            'department_id' => [
                'required', 
                'integer', 
                'exists:departments,id', // Ensure the department exists
            ],
            'doctor_title' => [
                'nullable', // This field is optional
                'string', 
                'max:255',
            ],
            'doctor_image' => [
                'nullable', // This field is optional
                'image', // Ensure it's an image
                'mimes:jpeg,png,jpg,gif', // Allowed image types
                'max:2048', // Max size in kilobytes
            ],
            'available_schedule' => [
                 // This field is now required
                'array', // Ensure it's an array
            ],
            'available_schedule.*.month' => [
                 // Ensure the month is provided
                'string', // Each month should be a string
                'in:January,February,March,April,May,June,July,August,September,October,November,December', // Valid months
            ],
            'available_schedule.*.days' => [
                 // At least one day must be selected
                'array', // Ensure it's an array
                'min:1', // Ensure at least one day is selected
            ],
            'available_schedule.*.days.*' => [
                'string', // Each day should be a string
                'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', // Valid days of the week
            ],
            'available_schedule.*.times' => [
                 // At least one time must be selected
                'array', // Ensure it's an array
                'min:1', // Ensure at least one time is selected
            ],
            'available_schedule.*.times.*' => [
                'string', // Each time should be a string
                'date_format:H:i', // Ensure the time is in the correct format (24-hour)
            ],
        ];
    }
}