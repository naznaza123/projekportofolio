<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    protected $table="profil";
    protected $guarde=[];
    protected $primaryKey="nis";
    protected $fillable=['nis','nama','jk','ttl','pendidikan','alamat','foto','about'];
}
?>
