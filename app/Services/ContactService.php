<?php
namespace App\Services;

use App\Http\Resources\ContactResource;
use App\Repositories\ContactRepository;
use App\Repositories\Contracts\ContactRepositoryInterface;
use http\Client\Response;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    /**
     * @var ContactRepository
     */
    private ContactRepository $contactRepository;

    /**
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function save(array $data){
        return $this->contactRepository->save($data);
    }

    public function destroy(string $id){
        return $this->contactRepository->destroy($id);
    }

    public function get(string $id){
        return $this->contactRepository->getById($id);
    }

    public function update(string $id,$data){
        return $this->contactRepository->update($id,$data);
    }

    public function getContactsWithInformations(string $id){
        return $this->contactRepository->getContactWithInformations($id);
    }

    public function getContacts()
    {
        return $this->contactRepository->getContacts();
    }

}
