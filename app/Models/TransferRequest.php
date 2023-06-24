<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferRequest extends Model
{
    use HasFactory;

    protected $guarded = [
        "created_at", "updated_at"
    ];

    public function transferRequestAssets(){
        return $this->hasMany(TransferRequestAssets::class, "transfer_request");
    }
}
