<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 * 
 * @property int $madanhmuc
 * @property string $tendanhmuc
 * 
 * @property Collection|Sanpham[] $sanphams
 *
 * @package App\Models
 */
class Danhmuc extends Model
{
	protected $table = 'danhmuc';
	protected $primaryKey = 'madanhmuc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'madanhmuc' => 'int'
	];

	protected $fillable = [
		'tendanhmuc'
	];

	public function sanphams()
	{
		return $this->hasMany(Sanpham::class, 'madanhmuc');
	}
}
