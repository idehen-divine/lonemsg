@extends('layouts.auth')
@section('title', $user)
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/pintura/pintura.css') }}">
    <style>
        .input-group {
            width: 100%;
            resize: none;
            box-sizing: border-box;
            overflow-y: hidden;
            border-radius: 1em;
            background: transparent;
            border: 3px solid rgba(89, 91, 239, 0.354) !important;
        }

        .form-control {
            resize: none;
            box-sizing: border-box;
            overflow-y: hidden;
            border: none !important;
            outline: none !important;
            background: transparent;
        }

        .form-control:focus {
            background: transparent;
        }

        .btn {
            border-radius: 50%;
            padding: 5px;
        }

        #imageCard {
            margin: 10px;
            width: 100%;
            height: 100%;
            border-radius: 1em;
            position: relative;
        }

        .avatarContainer {
            position: relative;
        }

        .avatarContainer,
        .avatar {
            width: inherit;
            height: inherit;
            object-fit: cover;
            border-radius: 1em;
            cursor: default;
        }

        .cancel-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
        }

        .overlay-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
            box-sizing: border-box;
        }
    </style>
@endsection
@section('contents')
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <x-logo />
                        <!-- /Logo -->
                        <h4 class="mb-2">Send Anonymous Message</h4>
                    <p class="mb-4">Send message to {{ $user }} they won't know who sent it</p>
                        <form id="formText" method="post" action="javascript:void(0);">
                            @csrf
                            <div class="input-group">
                                <textarea class="form-control p-2 m-0" name="message" id="messageInput" required placeholder="Enter Text ..."></textarea>
                                <input type="hidden" name="type" value="1">
                                <div class="message-actions d-flex align-items-center ms-0 me-1">
                                    <span class="m-0 p-0" id="sendImg">
                                        <i class="fas fa-camera cursor-pointer m-0 mx-2" style="width: 28px; height: 28px;"></i>
                                    </span>
                                    <button type="submit" class="btn btn-primary d-flex send-msg-btn m-0 mx-2">
                                        <i class="bx bx-paper-plane m-0 p-0"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="card d-none responsive-card shadow mx-auto" id="imageCard">
                            <div class="avatarContainer">
                                <span class="m-0 p-0 cancel-icon" id="cancelBtn">
                                    <i class="fas fa-times cancel-icon cursor-pointer m-0"></i>
                                </span>
                                <img class="avatar" id="selectedImage" alt="img">
                                <div class="overlay-content">
                                    <form id="formImg" method="post" enctype="multipart/form-data"
                                        action="javascript:void(0);">
                                        @csrf
                                        <div class="input-group">
                                            <input type="file" id="imageInput" name="image" accept="image/*"
                                                style="display: none;">
                                            <input type="hidden" name="type" value="2">
                                            <textarea class="form-control p-2 m-0" name="message" id="messageInput" placeholder="Enter Text ..."></textarea>
                                            <div class="message-actions d-flex align-items-center ms-0 me-1">
                                                <button type="submit" class="btn btn-primary d-flex send-msg-btn m-0">
                                                    <i class="bx bx-paper-plane m-0 p-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
@section('script')
    <script src="{{ asset('assets/vendor/pintura/pintura-iife.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-pintura/dist/useEditorWithJQuery-iife.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            let timeout;

            useEditorWithJQuery(jQuery, pintura);

            $('.message-actions').on('mousedown', '#sendImg', function() {
                removeImage();
                $('#imageInput').trigger('click');
            });

            $('#imageInput').change(function() {
                const file = this.files[0];
                handleFile(file);
            });

            $('#imageCard').on('mousedown', '#cancelBtn', function() {
                removeImage();
            });

            $('#formText').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                submitForm(formData);
            });

            $('#formImg').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                if (editedImageData) {
                    formData.append('editedImage', editedImageData);
                }
                submitForm(formData);
            });

        });

        function removeImage() {
            $('#formText').removeClass('d-none');
            $('#imageCard').addClass('d-none');
            $('#formImg')[0].reset();
        }

        function handleFile(file) {
            if (file instanceof Blob) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageUrl = e.target.result;
                    console.log('handle file');

                    // Open Pintura editor with the selected image
                    if ($.fn.pintura) {
                        const editor = $.fn.pintura.openDefaultEditor({
                            src: imageUrl,
                        });

                        // Update the result image with the edited image
                        editor.on("process", (res) => {
                            const editedImageUrl = URL.createObjectURL(res.dest);
                            $('#selectedImage').attr('src', editedImageUrl);
                            $('#formText').addClass('d-none');
                            $('#imageCard').removeClass('d-none');
                            editedImageData = res.dest;
                        });
                    } else {
                        console.error('Pintura is not loaded or initialized.');
                    }
                };

                reader.readAsDataURL(file);
            } else {
                console.error('Invalid file type.');
            }
        }

        function submitForm(formData) {
            Swal.fire({
                title: 'Sending...',
                html: '<div class="spinner">' +
                    '<div class="rect1"></div>' +
                    '<div class="rect2"></div>' +
                    '<div class="rect3"></div>' +
                    '<div class="rect4"></div>' +
                    '<div class="rect5"></div>' +
                    '</div>',
                showConfirmButton: false,
                allowOutsideClick: false,
            });
            $.ajax({
                type: "POST",
                url: "{{ route('message.send', $user) }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response);
                    if (response.hasOwnProperty('message')) {
                        window.location.href = "{{ route('register') }}";
                        if (response.status === 'success') {
                        Swal.fire({
                            title: "Done",
                            text: response.message,
                            icon: "success",
                        });
                        } else {
                        Swal.fire({
                            title: "Oops...",
                            text: response.message,
                            icon: "error",
                        });
                        }
                    }
                },
                error: function(xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON') && xhr.responseJSON.hasOwnProperty(
                            'error')) {
                        location.reload();
                        Swal.fire({
                            title: "Oops...",
                            text: xhr.responseJSON.error,
                            icon: "error",
                        });
                    }
                }
            });
        }
    </script>
@endsection
