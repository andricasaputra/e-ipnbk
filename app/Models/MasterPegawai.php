<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    protected $connection   = 'usersDB';

    public function user() {

        return $this->belongsTo(User::class);
   }
}
