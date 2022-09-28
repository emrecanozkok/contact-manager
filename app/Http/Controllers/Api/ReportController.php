<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Contact;
use App\Models\ContactInformation;
use App\Queries\TopContactsQuery;
use App\Queries\TopLocationsQuery;
use App\Queries\TopPhonesQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    /**
     * @param TopLocationsQuery $query
     * @return ReportResource
     */
    public function topLocations(TopLocationsQuery $query): ReportResource
    {
        return new ReportResource($query());
    }

    /**
     * @param TopContactsQuery $query
     * @return ReportResource
     */
    public function topContacts(TopContactsQuery $query): ReportResource
    {
        return new ReportResource($query());
    }

    /**
     * @param TopPhonesQuery $query
     * @return ReportResource
     */
    public function topPhones(TopPhonesQuery $query): ReportResource
    {
        return new ReportResource($query());
    }
}
