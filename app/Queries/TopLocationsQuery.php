<?php
namespace App\Queries;

use App\Models\ContactInformation;

class TopLocationsQuery
{
    public function __invoke()
    {
        return ContactInformation::select('information_content as location')
            ->selectRaw('count(id) as total')
            ->where('information_type', 'LOCATION')
            ->groupBy('information_content')->orderBy('total','DESC')->get();
    }
}
