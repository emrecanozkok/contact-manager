<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactDeleteRequest;
use App\Http\Requests\ContactShowRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Resources\ContactCollectionResource;
use App\Http\Resources\ContactInformationResource;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function MongoDB\BSON\toJSON;

class ContactController extends Controller
{

    private ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }


    public function index()
    {
        return new ContactCollectionResource($this->contactService->getContacts());
    }

    public function show(ContactShowRequest $request){
        $contactWithInformations = $this->contactService->getContactsWithInformations($request->contact);

        return new ContactResource($contactWithInformations->first());
    }

    /**
     * @param ContactCreateRequest $request
     * @return JsonResponse
     */
    public function store(ContactCreateRequest $request): JsonResponse
    {
        return response()->json(
            ContactResource::make(
                $this->contactService->save(
                    $request->all()
                )
            )
        );
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
