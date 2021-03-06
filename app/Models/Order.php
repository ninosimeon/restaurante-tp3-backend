<?php

namespace App\Models;

use App\Models\Traits\ModelUuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    const DOCUMENT_NUMBER_PREFIX = 'NP';

    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_COMPLETED = 'completed';
    const ORDER_STATUS_CANCELED = 'canceled';

    use ModelUuidTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'warehouse_id', 'document_number', 'status', 'comment'
    ];

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'order_has_products')->withPivot('quantity')->withTimestamps();
    }

    public function warehouse() {
        return $this->belongsTo('App\Models\Warehouse');
    }

    public function quotation_request() {
        return $this->hasOne('App\Model\QuotationRequest');
    }

    public function transfer_guide() {
        return $this->hasOne('App\Model\TransferGuide');
    }

}
