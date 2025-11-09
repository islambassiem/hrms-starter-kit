<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $request->user();

        if (! $user) {
            return [];
        }

        $user->load('employee');

        return [
            'id' => $user->id,
            'name' => $user->name,
            'employee_code' => $user->employee_code,
            'initials' => $user->employee?->initials,
            'email' => $user->email,
            'avatar' => asset('storage/profile/'.$user->employee_code.'.jpeg'),
        ];
    }
}
