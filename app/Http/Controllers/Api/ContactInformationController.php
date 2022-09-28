<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactDeleteRequest;
use App\Http\Requests\ContactInformationCreateRequest;
use App\Http\Resources\ContactInformationResource;
use App\Services\ContactInformationService;
use http\Client\Response;
use Illuminate\Http\JsonResponse;


class ContactInformationController extends Controller
{

    private ContactInformationService $contactInformationService;

    /**
     * @param ContactInformationService $contactInformationService
     */
    public function __construct(ContactInformationService $contactInformationService)
    {
        $this->contactInformationService = $contactInformationService;
    }

    /**
     * @param ContactInformationCreateRequest $request
     * @return JsonResponse
     */
    public function store(ContactInformationCreateRequest $request): JsonResponse
    {
        return (new ContactInformationResource(
            $this->contactInformationService->save(
                $request->contact,
                $request->all()
            )))->response()->setStatusCode(201);
    }

    /**
     * @param ContactDeleteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactDeleteRequest $request): \Illuminate\Http\Response
    {
        $this->contactInformationService->destroy($request->information);
        return response()->noContent(200);
    }


}
