<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sanpham
 * 
 * @property int $masp
 * @property string $tensp
 * @property int $gia
 * @property string|null $mota
 * @property string $anh
 * @property int $madanhmuc
 * @property string|null $manhinh
 * @property string|null $cpu
 * @property string|null $ram
 * @property string|null $ocung
 * @property string|null $card
 * @property string|null $cam
 * 
 * @property Danhmuc $danhmuc
 * @property Collection|Chitietdonhang[] $chitietdonhangs
 * @property Collection|Chitietgiohang[] $chitietgiohangs
 *
 * @package App\Models
 */
class Sanpham extends Model
{
	protected $table = 'sanpham';
	protected $primaryKey = 'masp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'masp' => 'int',
		'gia' => 'int',
		'madanhmuc' => 'int'
	];

	protected $fillable = [
		'tensp',
		'gia',
		'mota',
		'anh',
		'madanhmuc',
		'manhinh',
		'cpu',
		'ram',
		'ocung',
		'card',
		'cam'
	];

	public function danhmuc()
	{
		return $this->belongsTo(Danhmuc::class, 'madanhmuc');
	}

	public function chitietdonhangs()
	{
		return $this->hasMany(Chitietdonhang::class, 'masp');
	}

	public function chitietgiohangs()
	{
		return $this->hasMany(Chitietgiohang::class, 'masp');
	}
}
