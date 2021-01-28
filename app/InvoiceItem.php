<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use SoftDeletes;
    //
    public function get_item_name_ar()
    {
        return ($this->item_model == 'App\Contract')
            ? 'خدمات إستشارات هندسية (عقد ' . $this->item_name_ar . ')'
            // : 'خدمات إستشارات هندسية (' . $this->item_name_ar . ')';
            : $this->item_name_ar;
    }
}
