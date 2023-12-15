@extends('layouts.auth')
@section('title', $username)
@section('contents')
    <!-- Content -->
    <div class="container-xxl mb-5">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <x-logo />
                        <!-- /Logo -->
                        @unless (count($messages) == 0)
                            @foreach ($messages as $message)
                                <x-msg :message=$message />
                            @endforeach
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">No messages yet!. Copy link to receive message.</p>
                                    <small class="d-flex justify-content-between">
                                        <p class="ms-2" id="message-url">{{ url('/' . $username) }}</p>
                                        <div class="">
                                            <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,8"
                                                data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                                data-bs-original-title="Copy Link!" id="copy-button"
                                                data-clipboard-target="#message-url" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-clipboard"></i>
                                            </button>
                                            <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,8"
                                                data-bs-placement="top" data-bs-custom-class="tooltip-secondary"
                                                data-bs-original-title="Share" onclick="shareMsg()"
                                                class="btn btn-sm btn-secondary">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        @endunless
                    </div>
                    @if (count($messages) !== 0)
                        <div class="d-flex justify-content-between m-2">
                            <small class="ms-2" id="message-url">{{ url('/' . $username) }}</small>
                            <div class="">
                                <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-secondary" data-bs-original-title="Copy Link!"
                                    id="copy-button" data-clipboard-target="#message-url" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-clipboard"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top"
                                    data-bs-custom-class="tooltip-secondary" data-bs-original-title="Share"
                                    onclick="shareMsg()" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-share"></i>
                                </button>
                                <button type="button" data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top"
                                data-bs-custom-class="tooltip-danger" data-bs-original-title="CLear messages"
                                onclick="del()" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <form id="delForm" action="{{ route('message.clear', $userId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="" id="bottom"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            new ClipboardJS('#copy-button');


            var bottomDiv = $('#bottom');
            if (bottomDiv.length) {
                $('html, body').animate({
                    scrollTop: bottomDiv.offset().top
                }, 1000); // Adjust the duration as needed
            }
        });

        function refresh() {
            location.reload();
        }

        setInterval(function() {
            checkForNewMessages();
        }, 5000); // 60000 milliseconds = 1 minute

        function checkForNewMessages() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var messagesCountOnPage = parseInt('{{ $messages->count() }}');
            $.ajax({
                url: "{{ route('refresh') }}",
                method: "GET",
                success: function(data) {
                    var messagesCountFromServer = parseInt(data.messages);
                    if (messagesCountOnPage !== messagesCountFromServer) {
                        location.reload();
                    }
                },
                error: function(error) {
                    console.error('Error checking for new messages:', error);
                }
            });
        }

        function shareMsg() {
            var messageTitle = "*LONEMSG | Send annonimous message*";
            var messageText = "Send a message to {{ $username }} and they won't know who sent it!";
            var messageUrl = "{{ route('message', $username) }}";

            if (navigator.share) {
                navigator.share({
                        title: messageTitle,
                        text: messageText,
                        url: messageUrl
                    })
                    .then(() => console.log('Message shared'))
                    .catch((error) => console.error('Error sharing message:', error));
            } else {
                // Fallback for browsers that don't support the Web Share API
                var combinedMessage = "*" + messageTitle + '*\n' + messageText + '\n' + messageUrl;

                var tempInput = $('<textarea>');
                tempInput.val(combinedMessage);
                $('body').append(tempInput);
                tempInput.select();
                document.execCommand("copy");
                tempInput.remove();

                Swal.fire({
                    icon: 'warning',
                    title: 'Sharing Not Supported',
                    text: 'Sharing not supported. Details copied to clipboard.',
                    confirmButtonText: 'OK'
                });
            }
        }

        function del() {
            Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to clear all your message?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    cancelButtonColor: "#0d6efd",
                    confirmButtonText: "Yes, clear it!",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $('#delForm').submit();
                    }
                });
        }
    </script>
@endsection
