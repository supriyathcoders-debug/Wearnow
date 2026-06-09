<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required_if:country,India|nullable|string|max:255',
            'zip' => 'required|string|max:255',
            'country' => 'required|string|max:255',
          
            'password' => 'required|string|min:8|confirmed',
           
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'adharcard' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10240',
            'pancard' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10240',
        ];
    }
}
