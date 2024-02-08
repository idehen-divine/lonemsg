<?php

namespace App\Libs\RepositoryInterfaces;

interface MessageRepositoryInterface
{
	public function index();

    public function create($username);

    public function store($username, $request);

    public function destroy(string $id);
}
