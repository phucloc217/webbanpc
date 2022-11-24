<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietdonhang
 * 
 * @property int $id
 * @property int $iddonhang
 * @property int $masp
 * @property int $soluong
 * @property int $dongia
 * 
 * @property Donhang $donhang
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Chitietdonhang extends Model
{
	protected $table = 'chitietdonhang';
	public $timestamps = false;

	protected $casts = [
		'iddonhang' => 'int',
		'masp' => 'int',
		'soluong' => 'int',
		'dongia' => 'int'
	];

	protected $fillable = [
		'iddonhang',
		'masp',
		'soluong',
		'dongia'
	];

	public function donhang()
	{
		return $this->belongsTo(Donhang::class, 'iddonhang');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'masp');
	}
}
