<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $guarded = [];

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'new' => 'Baru',
            'processing' => 'Diproses',
            'completed' => 'Selesai',
            default => "Tidak Diketahui"
        };
    }

    public function getReportDateLabelAttribute()
    {
        return Carbon::parse($this->report_date)->format('d M Y, H:i:s');
    }
}
