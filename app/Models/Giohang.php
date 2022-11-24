<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giohang
 * 
 * @property int $magiohang
 * @property string $makh
 * 
 * @property Khachhang $khachhang
 * @property Collection|Chitietgiohang[] $chitietgiohangs
 *
 * @package App\Models
 */
class Giohang extends Model
{
	protected $table = 'giohang';
	protected $primaryKey = 'magiohang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'magiohang' => 'int'
	];

	protected $fillable = [
		'makh'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'makh');
	}

	public function chitietgiohangs()
	{
		return $this->hasMany(Chitietgiohang::class, 'magiohang');
	}
}
