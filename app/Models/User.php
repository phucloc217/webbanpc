<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property string $id
 * @property string $tenuser
 * @property string|null $sdt
 * @property string|null $email
 * @property string $username
 * @property string $password
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'tenuser',
		'sdt',
		'email',
		'username',
		'password'
	];
}
