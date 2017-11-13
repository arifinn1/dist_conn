<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    public function IdGenerator()
    {
        $new_id = DB::table('stores')
            ->selectRaw('(ifnull(max(id),0)+1) as n_id')
            ->first()
            ->n_id;
        return $new_id;
    }

    public function isActive($email)
    {
        $row_count = DB::table('stores as s')
            ->join('users as u', 'u.store_id', '=', 's.id')
            ->where('s.active', 1)
            ->get()->count();
        return $row_count;
    }
}
