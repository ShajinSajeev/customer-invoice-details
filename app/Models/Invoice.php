<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer', 'date', 'amount', 'status'];

    /**
     * Get the Customer that owns the invoice.
     */
    public function customerData(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer', 'id');
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => optional($this->customerData)->name,
        );
    }

}
