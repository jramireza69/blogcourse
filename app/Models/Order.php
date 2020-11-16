<?php

namespace App\Models;

use App\Helpers\Currency;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $coupon_id
 * @property string|null $invoice_id Factura generada por Stripe
 * @property float $total_amount Coste total del Pedido
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{


    protected $guarded = ["id"];

    const SUCCESS = "SUCCESS";
    const PENDING = "PENDING";

    protected $appends = [
        "formatted_total_amount",
        "formatted_status",
        "coupon_code"
    ];

    public function order_lines() {
        return $this->hasMany(OrderLine::class);
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }

    public function getFormattedTotalAmountAttribute() {
        if ($this->total_amount) {
            return Currency::formatCurrency($this->total_amount, true);
        }
        return Currency::formatCurrency(0);
    }

    public function getFormattedStatusAttribute() {
        return $this->status === self::SUCCESS ? __("Procesado") : __("Pendiente");
    }

    public function getCouponCodeAttribute(): string {
        if ($this->coupon_id) {
            return $this->coupon->code;
        }
        return "N/A";
    }
}
