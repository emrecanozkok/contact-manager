<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactDeleteRequest;
use App\Http\Requests\ContactInformationCreateRequest;
use App\Http\Resources\ContactInformationResource;
use App\Services\ContactInformationService;


class ContactInformationController extends Controller
{
    /**
     * @var ContactInformationService
     */
    private ContactInformationService $contactInformationService;

    public function __construct(ContactInformationService $contactInformationService)
    {
        $this->contactInformationService = $contactInformationService;
    }

    public function store(ContactInformationCreateRequest $request): ContactInformationResource
    {
            return new ContactInformationResource(
                $this->contactInformationService->save(
                    $request->contact,
                    $request->all()
                )
            );
    }


    public function destroy(ContactDeleteRequest $request): \Illuminate\Http\Response
    {
        $this->contactInformationService->destroy($request->information);
        return response()->noContent(200);
    }


}
