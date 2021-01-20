<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model

{
    // -----------------------------------------------------------------------------------------------------------------
    use SoftDeletes;
    // -----------------------------------------------------------------------------------------------------------------
    protected $guarded = [
        'id',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_issued_by()
    {
        $user = User::where('id', $this->created_by_id)->first();
        $person = $user->person()->first();
        if ($this->created_by_id == 2) {
            $issued_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name5;
        } elseif (!$person->ar_name2) {
            $issued_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name5;
        } else {
            $issued_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name2 . ' ' . $person->ar_name5;
        }
        return $issued_by;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_last_edit_by()
    {
        $person = Person::where('id', $this->last_edit_by_id)->first();
        if ($this->created_by_id == 2) {
            $last_edit_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name5;
        } elseif (!$person->ar_name2) {
            $last_edit_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name5;
        } else {
            $last_edit_by = $person->job_title . ': ' . $person->ar_name1 . ' ' . $person->ar_name2 . ' ' . $person->ar_name5;
        }
        return $last_edit_by;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
