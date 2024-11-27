<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    public function format(){
        return [
            'site_name' => $this->site_name,
            'site_owner' => $this->site_owner,
            'site_developed_by' => $this->site_developed_by,
            'site_copyright_ownership' => $this->site_copyright_ownership,
            'site_maintenance_by' => $this->site_maintenance_by,
            'site_address'	 => $this->site_address,
            'site_phone' => $this->site_phone,
            'site_email' => $this->site_email,
            'site_url' => $this->site_url,
         ];
    }
}
