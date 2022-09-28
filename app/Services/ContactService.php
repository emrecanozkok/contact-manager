<?php
namespace App\Services;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use App\Repositories\Contracts\ContactRepositoryInterface;
use http\Client\Response;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{

    private ContactRepository $contactRepository;

    /**
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param array $data
     * @return \App\Models\Contact
     */
    public function save(array $data){
        return $this->contactRepository->save($data);
    }

    /**
     * @param string $id
     * @return int
     */
    public function destroy(string $id): int
    {
        return $this->contactRepository->destroy($id);
    }

    /**
     * @param string $id
     * @return Contact
     */
    public function get(string $id): Contact
    {
        return $this->contactRepository->getById($id);
    }

    /**
     * @param string $id
     * @param $data
     * @return int
     */
    public function update(string $id,$data): int
    {
        return $this->contactRepository->update($id,$data);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getContactsWithInformations(string $id): mixed
    {
        return $this->contactRepository->getContactWithInformations($id);
    }

    /**
     * @return Collection
     */
    public function getContacts(): Collection
    {
        return $this->contactRepository->getContacts();
    }

}
