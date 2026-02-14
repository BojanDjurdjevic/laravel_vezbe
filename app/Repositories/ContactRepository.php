<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository {
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactModel();
    }

    public function getContactById($id)
    {
        return $this->contactRepo->where(['id' => $id])->first();
    }

    public function createNew($request)
    {
        return $this->contactRepo->create($request);
    }
}