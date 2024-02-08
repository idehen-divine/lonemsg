<x-auth-layouts :title="ucwords($user->username)">
	<div class="card">
		<div class="card-body">
			<!-- Logo -->
			<x-logo />
			<!-- /Logo -->
			<h4 class="mb-2">Send Anonymous Message</h4>
			<p class="mb-4">Send message to {{ $user->username }} they won't know who sent it</p>
			<form id="formText" method="post" action="javascript:void(0);">
				@csrf
				<div class="input-group">
					<textarea class="form-control p-3 m-0" name="message" id="messageInput" required placeholder="Enter Text ..."></textarea>
					<input type="hidden" name="type" value="1">
					<div class="input-group-text border-0 m-0 p-0 pe-2">
						<button type="button" class="btn btn-primary btn-sm me-1" id="sendImg">
							<i class="bx bxs-camera"></i>
						</button>
						<button type="submit" class="btn btn-outline-primary btn-sm d-flex send-msg-btn">
							<i class="bx bx-paper-plane"></i>
						</button>
					</div>
				</div>
			</form>

			<div class="card d-none responsive-card shadow mx-auto" id="imageCard">
				<div class="avatarContainer">
					<span class="m-0 p-0 cancel-icon" id="cancelBtn">
						<i class="fas fa-times cancel-icon cursor-pointer m-0"></i>
					</span>
					<img class="avatars" src="{{ asset('assets/img/avatars/test.jpg') }}" id="selectedImage" alt="img">
					<div class="overlay-content">
						<form id="formImg" method="post" enctype="multipart/form-data" action="javascript:void(0);">
							@csrf
							<div class="input-group">
								<input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
								<input type="hidden" name="type" value="2">
								<textarea class="form-control p-2 m-0" name="message" id="messageInput" placeholder="Enter Text ..."></textarea>
								<div class="input-group-text border-0 m-0 p-0 pe-2">
									<button type="submit" class="btn btn-outline-primary btn-sm d-flex send-msg-btn">
										<i class="bx bx-paper-plane"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@push('style')
		<link rel="stylesheet" href="{{ asset('assets/vendor/libs/pintura/pintura.css') }}">
		<style>
			.input-group {
				width: 100%;
				height: 50px;
				resize: none;
				box-sizing: border-box;
				overflow-y: hidden;
				border-radius: 1em;
				border: 2px solid rgba(89, 91, 239, 0.354) !important;
			}

			.input-group-text {
				height: inherit;
			}

			.form-control {
				margin: 5px;
				resize: none;
				box-sizing: border-box;
				overflow-y: hidden;
				border: none !important;
				outline: none !important;
			}

			#imageCard {
				margin: 5%;
				width: 100%;
				height: 100%;
				border-radius: 1em;
				position: relative;
			}

			.avatarContainer {
				position: relative;
			}

			.avatarContainer,
			.avatars {
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
	@endpush

	@push('script')
		<script src="{{ asset('assets/vendor/libs/pintura/pintura-iife.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/jquery-pintura/dist/useEditorWithJQuery-iife.js') }}"></script>
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).ready(function() {
				let timeout;

				useEditorWithJQuery(jQuery, pintura);

				$('.input-group-text').on('mousedown', '#sendImg', function() {
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

			function show() {
				$('#modalId').modal("show");
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
                const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: "btn btn-primary",
						cancelButton: "btn btn-secondary"
					},
					buttonsStyling: false,
				});
				$.ajax({
					type: "POST",
					url: "{{ route('user.message.send', $user->username) }}",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: (response) => {
						console.log(response);
						if (response.hasOwnProperty('message')) {
							if (response.status === 'success') {
								$('#formImg')[0].reset();
								$('#formText')[0].reset();
                                removeImage()
								swalWithBootstrapButtons.fire({
									title: "Message sent to {{ $user->username }} successfully",
									text: "Get your own uniqe link and start receiving messages",
									showCancelButton: true,
									cancelButtonText: "Send again",
									confirmButtonText: "Register",
									icon: "success",
									allowOutsideClick: false,
									allowEscapeKey: false,
									allowEnterKey: false	
								}).then((result) => {
									if (result.isConfirmed) {
										window.location.href = '{{ route('register') }}';
									}
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
	@endpush
</x-auth-layouts>
