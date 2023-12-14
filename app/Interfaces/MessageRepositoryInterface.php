<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MessageRepositoryInterface
{
    public function index(string $username = null);
    public function show($username);
    public function store($username, $request);
    public function destroy(string $id);
}
