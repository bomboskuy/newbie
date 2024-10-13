<?php

// app/Models/JenisUser.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'idrole';

    protected $fillable = [
        'role',
    ];

    // Relasi ke tabel USER
    public function user()
    {
        return $this->hasMany(User::class, 'idrole');
    }

    // // Relasi ke tabel SETTING_MENU_USER (Menu yang diakses oleh role)
    // public function menus()
    // {
    //     return $this->belongsToMany(Menu::class, 'SETTING_MENU_USER', 'ID_JENIS_USER', 'MENU_ID');
    // }
}