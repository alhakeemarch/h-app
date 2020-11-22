<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //
    public function get_item_name_ar()
    {
        return ($this->item_model == 'App\Contract')
            ? 'خدمات إستشارات هندسية (عقد ' . $this->item_name_ar . ')'
            : 'خدمات إستشارات هندسية (' . $this->item_name_ar . ')';
    }
}
