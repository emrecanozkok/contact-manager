<?php
namespace App\Repositories\Contracts;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface ContactRepositoryInterface
{
    public function getContacts() : Collection;
    public function getById(string $id) : Contact;
    public function destroy(string $id) : int;
    public function update(string $id,array $data) : int;
    public function save(array $data) : Contact;
    public function getContactWithInformations(string $id):mixed;
}
