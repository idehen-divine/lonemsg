<?php

namespace App\Livewire;

use Livewire\Component;
use App\Libs\RepositoryInterfaces\MessageRepositoryInterface;

class Messages extends Component
{

	private MessageRepositoryInterface $messageRepository;

	public $messages;
    public $username;
    public $userId;
	/**
	 * Get messages from repository
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function message(): \Illuminate\Database\Eloquent\Collection
	{
		return $this->messages = $this->messageRepository->index();
	}

	/**
	 * Boot the component
	 */
	public function boot(): void
	{
		$this->messageRepository = app(MessageRepositoryInterface::class);
		$this->message();
		$this->username = auth()->guard('user')->user()->username;
        $this->userId = auth()->guard('user')->user()->id;
	}

	/**
	 * Render the component
	 *
	 * @return \Illuminate\View\View
	 */
	public function render(): \Illuminate\View\View
	{
		return view('livewire.messages');
	}
	// add PHPDoc and type declarations for method parameters and return types
}


