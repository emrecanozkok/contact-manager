<?php

namespace App\Repositories;


use App\Models\Contact;
use App\Models\ContactInformation;
use App\Repositories\Contracts\ContactInformationRepositoryInterface;

class ContactInformationRepository implements ContactInformationRepositoryInterface
{
    /**
     * @param $data
     * @return Contact
     */
    public function save($data): Contact
    {
        $contact = new Contact();
        return $contact->create($data);
    }

    /**
     * @param string $informationId
     * @return int
     */
    public function destroy(string $informationId): int
    {
        return ContactInformation::destroy($informationId);
    }

}
