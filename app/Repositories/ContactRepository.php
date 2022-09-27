<?php

namespace App\Repositories;


use App\Models\Contact;
use App\Repositories\Contracts\ContactRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getContacts(): Collection
    {
        return Contact::all();
    }

    /**
     * @param string $id
     * @return Contact
     */
    public function getById(string $id): Contact
    {
        return Contact::find($id);
    }

    /**
     * @param string $id
     * @return int
     */
    public function destroy(string $id): int
    {
        return Contact::destroy($id);
    }

    /**
     * @param string $id
     * @param array $data
     * @return int
     */
    public function update(string $id,array $data): int
    {
        return Contact::find($id)->update($data);
    }

    /**
     * @param $data
     * @return Contact
     */
    public function save(array $data): Contact
    {
        $contact = new Contact();
        $status = $contact->create($data);
        return $status;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getContactWithInformations (string $id){
        return Contact::where('id',$id)->with('informations')->get();
    }
}
