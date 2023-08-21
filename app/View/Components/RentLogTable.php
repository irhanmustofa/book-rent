<?php

namespace App\View\Components;

use Closure;
use App\Models\RentLogs;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RentLogTable extends Component
{

    public $rentlogs;
    /**
     * Create a new component instance.
     */
    public function __construct($rentlogs)
    {
        $this->rentlogs = $rentlogs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rent-log-table');
    }
}
