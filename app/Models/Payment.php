<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $customerNumber
 * @property string $checkNumber
 * @property Carbon $paymentDate
 * @property float $amount
 * 
 * @property Customer $customer
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customerNumber' => 'int',
		'paymentDate' => 'datetime',
		'amount' => 'float'
	];

	protected $fillable = [
		'paymentDate',
		'amount'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customerNumber');
	}
}
