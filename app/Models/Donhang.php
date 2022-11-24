<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donhang
 * 
 * @property int $madh
 * @property string $makh
 * @property int $thanhtien
 * @property int $trangthai
 * @property Carbon $ngaydat
 * 
 * @property Khachhang $khachhang
 * @property Collection|Chitietdonhang[] $chitietdonhangs
 *
 * @package App\Models
 */
class Donhang extends Model
{
	protected $table = 'donhang';
	protected $primaryKey = 'madh';
	public $timestamps = false;

	protected $casts = [
		'thanhtien' => 'int',
		'trangthai' => 'int'
	];

	protected $dates = [
		'ngaydat'
	];

	protected $fillable = [
		'makh',
		'thanhtien',
		'trangthai',
		'ngaydat'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'makh');
	}

	public function chitietdonhangs()
	{
		return $this->hasMany(Chitietdonhang::class, 'iddonhang');
	}
}
