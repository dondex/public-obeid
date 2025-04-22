<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location_image'];

    // Define the relationship with the Doctor model
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // Define the relationship with the Department model
    public function departments()
    {
        return $this->hasMany(Department::class); // Assuming each location has many departments
    }
}