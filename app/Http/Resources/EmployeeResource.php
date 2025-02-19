<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'middleName' => $this->middle_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'gender' => $this->gender,
            'birthDate' => $this->birth_date,
            'contact' => $this->contact,
            'jobPosition' => $this->job_position,
            'salary' => $this->salary,
            'department' => $this->department,
        ];
    }
}
