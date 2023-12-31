<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $orderNumber
 * @property Carbon $orderDate
 * @property Carbon $requiredDate
 * @property Carbon|null $shippedDate
 * @property string $status
 * @property string|null $comments
 * @property int $customerNumber
 * 
 * @property Customer $customer
 * @property Collection|Orderdetail[] $orderdetails
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'orderNumber';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'orderNumber' => 'int',
		'orderDate' => 'datetime',
		'requiredDate' => 'datetime',
		'shippedDate' => 'datetime',
		'customerNumber' => 'int'
	];

	protected $fillable = [
		'orderDate',
		'requiredDate',
		'shippedDate',
		'status',
		'comments',
		'customerNumber'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customerNumber');
	}

	public function orderdetails()
	{
		return $this->hasMany(Orderdetail::class, 'orderNumber');
	}
}
