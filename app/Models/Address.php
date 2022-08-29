<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'landmark',
        'street_name',
        'street_number'
    ];

    protected $appends = ['full_address'];


    /**
     * Get a full address as a single string attribute
     *
     * @return string
     */
    public function getFullAddressAttribute(){
        return $this->landmark . ' ' . $this->street_name . ' ' . $this->street_number;
    }

}
