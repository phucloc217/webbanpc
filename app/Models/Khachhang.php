<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Khachhang
 * 
 * @property string $makh
 * @property string $tenkh
 * @property string $sdt
 * @property string $diachi
 * @property string $matkhau
 * 
 * @property Collection|Donhang[] $donhangs
 * @property Collection|Giohang[] $giohangs
 *
 * @package App\Models
 */
class Khachhang extends Model
{
	protected $table = 'khachhang';
	protected $primaryKey = 'makh';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'matkhau'
	];

	protected $fillable = [
		'tenkh',
		'sdt',
		'diachi',
		'matkhau'
	];

	public function donhangs()
	{
		return $this->hasMany(Donhang::class, 'makh');
	}

	public function giohangs()
	{
		return $this->hasMany(Giohang::class, 'makh');
	}
}
