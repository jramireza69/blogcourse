<?php

namespace App\Models;

use App\Helpers\Currency;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = ["course_id", "order_id", "price"];

    protected $appends = [
        "formatted_price"
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function getFormattedPriceAttribute() {
        return Currency::formatCurrency($this->price, false);
    }

    
}
