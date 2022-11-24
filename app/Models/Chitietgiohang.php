<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietgiohang
 * 
 * @property int $id
 * @property int $magiohang
 * @property int $masp
 * @property int $soluong
 * 
 * @property Giohang $giohang
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Chitietgiohang extends Model
{
	protected $table = 'chitietgiohang';
	public $timestamps = false;

	protected $casts = [
		'magiohang' => 'int',
		'masp' => 'int',
		'soluong' => 'int'
	];

	protected $fillable = [
		'magiohang',
		'masp',
		'soluong'
	];

	public function giohang()
	{
		return $this->belongsTo(Giohang::class, 'magiohang');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'masp');
	}
}
