<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class BookingRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            // Booking details
            'branch_id' => 'required|exists:branches,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'nullable|exists:staff,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'payment_method' => 'required|in:cash,mpesa,card',
            'notes' => 'nullable|string|max:500',

            // Client information
            'client.first_name' => 'required|string|min:2|max:50',
            'client.last_name' => 'required|string|min:2|max:50',
            'client.email' => 'required|email|max:100',
            'client.phone' => 'required|regex:/^(?:\+254|0)[17]\d{8}$/',
            'client.date_of_birth' => 'nullable|date|before:today',
            'client.gender' => 'nullable|in:male,female,other,prefer_not_to_say',
            'client.allergies' => 'required|string|max:500',
            'client.create_account_status' => 'required|in:accepted,active,no_creation',
            'client.marketing_consent' => 'boolean',
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'branch_id.required' => 'Please select a branch location.',
            'branch_id.exists' => 'The selected branch is not available.',
            'service_id.required' => 'Please select a service.',
            'service_id.exists' => 'The selected service is not available.',
            'staff_id.exists' => 'The selected staff member is not available.',
            'appointment_date.required' => 'Please select an appointment date.',
            'appointment_date.after_or_equal' => 'Appointment date must be today or in the future.',
            'start_time.required' => 'Please select an appointment time.',
            'start_time.date_format' => 'Please provide a valid time format.',
            'payment_method.required' => 'Please select a payment method.',
            'payment_method.in' => 'Please select a valid payment method.',

            // Client validation messages
            'client.first_name.required' => 'First name is required.',
            'client.first_name.min' => 'First name must be at least 2 characters.',
            'client.last_name.required' => 'Last name is required.',
            'client.last_name.min' => 'Last name must be at least 2 characters.',
            'client.email.required' => 'Email address is required.',
            'client.email.email' => 'Please enter a valid email address.',
            'client.phone.required' => 'Phone number is required.',
            'client.phone.regex' => 'Please enter a valid Kenyan phone number (e.g., +254712345678 or 0712345678).',
            'client.date_of_birth.before' => 'Date of birth must be in the past.',
            'client.gender.in' => 'Please select a valid gender option.',
            'client.allergies.required' => 'Please specify any allergies or write "None".',
            'client.allergies.max' => 'Allergy information cannot exceed 500 characters.',
            'client.create_account_status.required' => 'Please specify account creation preference.',
            'client.create_account_status.in' => 'Invalid account creation option.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Custom validation for appointment time
            $appointmentDate = $this->input('appointment_date');
            $startTime = $this->input('start_time');

            if ($appointmentDate && $startTime) {
                $appointmentDateTime = Carbon::createFromFormat('Y-m-d H:i', $appointmentDate . ' ' . $startTime);
                $now = Carbon::now();

                // Check if appointment is at least 2 hours in the future
                if ($appointmentDateTime->lessThan($now->addHours(2))) {
                    $validator->errors()->add('start_time', 'Appointments must be booked at least 2 hours in advance.');
                }

                // Check if appointment is within business hours (example: 8 AM to 8 PM)
                $hour = $appointmentDateTime->hour;
                if ($hour < 8 || $hour >= 20) {
                    $validator->errors()->add('start_time', 'Appointments can only be booked between 8:00 AM and 8:00 PM.');
                }
            }

            // Validate phone number format more specifically
            $phone = $this->input('client.phone');
            if ($phone) {
                // Remove any spaces or dashes
                $cleanPhone = preg_replace('/[\s\-]/', '', $phone);
                
                // Check if it's a valid Kenyan mobile number
                if (!preg_match('/^(\+254|254|0)([17]\d{8})$/', $cleanPhone)) {
                    $validator->errors()->add('client.phone', 'Please enter a valid Kenyan mobile number.');
                }
            }
        });
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Clean and format phone number
        if ($this->has('client.phone')) {
            $phone = $this->input('client.phone');
            $phone = preg_replace('/[\s\-\(\)]/', '', $phone); // Remove spaces, dashes, parentheses
            
            // Convert to international format
            if (str_starts_with($phone, '0')) {
                $phone = '+254' . substr($phone, 1);
            } elseif (str_starts_with($phone, '254')) {
                $phone = '+' . $phone;
            }
            
            $this->merge([
                'client' => array_merge($this->input('client', []), [
                    'phone' => $phone
                ])
            ]);
        }

        // Ensure marketing consent is boolean
        if ($this->has('client.marketing_consent')) {
            $this->merge([
                'client' => array_merge($this->input('client', []), [
                    'marketing_consent' => filter_var($this->input('client.marketing_consent'), FILTER_VALIDATE_BOOLEAN)
                ])
            ]);
        }
    }
}