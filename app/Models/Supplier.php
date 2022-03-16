<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Supplier extends Model
{
    use HasFactory;

    // memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['nama_supplier', 'no_telepon', 'alamat', 'cover'];
    //memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['nama_supplier', 'no_telepon', 'alamat', 'cover'];
    //mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;

    public function barangmasuk()
    {
        //data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        return $this->hasMany('App\Models\Barangmasuk', 'supplier_id');
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('images/suppliers/'.$this->cover))) {
            return asset('images/suppliers/'.$this->cover);
        } else {
            return asset('img/user.png');
        }
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($supplier) {
            //mengecek apakah barang masih punya barang
            if ($supplier->barangmasuk->count() > 0) {
                //menyiapkan pesan error
                $html = 'barang tidak bisa di hapus karena memiliki kode_barang: ';
                $html .= '<ul>';
                foreach ($supplier->barangmasuk as $data) {
                    $html .= "<li>$data->kode_barang_masuk</li>";
                }
                $html .= '</ul>';
                Session::flash('flash_notification', [
                        'level' => 'danger',
                        'message' => $html,
                    ]);
                //membatalkan proses penghapusan
                return false;
            }
        });
    }
}
