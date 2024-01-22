<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    public function number_of_contributions(){
        $number_assigned = DB::select("select count(*) as items from contributions where member_id=?", [$this->id]);
        return $number_assigned[0]->items;
    }
}
