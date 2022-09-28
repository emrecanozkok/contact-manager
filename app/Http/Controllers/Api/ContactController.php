<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactDeleteRequest;
use App\Http\Requests\ContactShowRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Resources\ContactCollectionResource;
use App\Http\Resources\ContactResource;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ContactController extends Controller
{

    private ContactService $contactService;

    /**
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * @return ContactCollectionResource
     */
    public function index()
    {
        return new ContactCollectionResource($this->contactService->getContacts());
    }

    /**
     * @param ContactShowRequest $request
     * @return ContactResource
     */
    public function show(ContactShowRequest $request): ContactResource
    {
        $contactWithInformations = $this->contactService->getContactsWithInformations($request->contact);
        return new ContactResource($contactWithInformations->first());
    }

    /**
     * @param ContactCreateRequest $request
     * @return JsonResponse
     */
    public function store(ContactCreateRequest $request): JsonResponse
    {
        return (new ContactResource($this->contactService->save($request->all())))->response()->setStatusCode(201);
    }

    /**
     * @param ContactUpdateRequest $request
     * @return Response
     */
    public function update(ContactUpdateRequest $request): Response
    {
        $this->contactService->update($request->contact,$request->all());
        return response()->noContent(200);
    }

    /**
     * @param ContactDeleteRequest $request
     * @return Response
     */
    public function destroy(ContactDeleteRequest $request): Response
    {
        $this->contactService->destroy($request->contact);
        return response()->noContent(200);
    }
}
