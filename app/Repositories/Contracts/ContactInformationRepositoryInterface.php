<?php
namespace App\Repositories\Contracts;

use App\Models\Contact;

interface ContactInformationRepositoryInterface
{
    public function destroy(string $id) : int;
    public function save(int $id) : Contact;
}
