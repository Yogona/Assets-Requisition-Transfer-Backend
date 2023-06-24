<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferRequestAssets extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at", "updated_at"
    ];

    public function departmentAsset(){
        return $this->belongsTo(DepartmentsInstruments::class, "department_asset");
    }
}
