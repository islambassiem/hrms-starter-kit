<?php

namespace App\Models;

use App\Traits\TrackUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    use TrackUser;

    /**
     * @return Attribute<mixed, mixed>
     */
    public function englishName(): Attribute
    {
        $name = $this->first_name_en.' ';
        if ($this->middle_name_en) {
            $name .= $this->middle_name_en.' ';
        }
        if ($this->third_name_en) {
            $name .= $this->third_name_en.' ';
        }
        $name .= $this->last_name_en;

        return new Attribute(
            get: fn () => $name,
        );
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    public function arabicName(): Attribute
    {
        $name = $this->first_name_ar.' ';
        if ($this->middle_name_ar) {
            $name .= $this->middle_name_ar.' ';
        }
        if ($this->third_name_ar) {
            $name .= $this->third_name_ar.' ';
        }
        $name .= $this->last_name_ar;

        return new Attribute(
            get: fn () => $name,
        );
    }

    /**
     * @property-read string $initials
     */
    public function getInitialsAttribute(): string
    {
        return strtoupper(substr($this->first_name_en, 0, 1).substr($this->last_name_en, 0, 1));
    }
}
