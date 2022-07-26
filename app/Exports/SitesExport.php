<?php

namespace App\Exports;

use App\Models\Sites;
// use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SitesExport implements FromView
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function view(): View
  {
    return view('exports.sites', [
      'sites' => Sites::all()
    ]);
  }
}
