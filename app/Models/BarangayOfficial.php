<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\BarangayScope;

#[ScopedBy([BarangayScope::class])]
class BarangayOfficial extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'barangay_id',
        'name',
        'rank',
        'title',
        'photo',
        'contact_number',
    ];

    protected $table = 'barangay_official';

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
