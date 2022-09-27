<?php

namespace App\Services;


use App\Models\ContactInformation;
use App\Repositories\Contracts\ContactInformationRepositoryInterface;

class ContactInformationService
{

    private ContactInformationRepositoryInterface $contactInformationRepository;
    private ContactService $contactService;


    /**
     * @param ContactInformationRepositoryInterface $contactInformationRepository
     * @param ContactService $contactService
     */
    public function __construct(ContactInformationRepositoryInterface $contactInformationRepository, ContactService $contactService)
    {
        $this->contactInformationRepository = $contactInformationRepository;
        $this->contactService = $contactService;
    }

    public function save($contactId, array $data): ContactInformation
    {
        $contact = $this->contactService->get($contactId);
        return $contact->informations()->create($data);
    }

    public function destroy(string $informationId): int
    {
        return $this->contactInformationRepository->destroy($informationId);
    }


}
