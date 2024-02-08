<x-auth-layouts :title="'Profile Update'">
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <x-logo />
            <!-- /Logo -->
            <h4 class="mb-2">Update your profile to start receiving messages</h4>
            {{-- <p class="mb-4">Make your app management easy and fun!</p> --}}

            <form id="registeration" class="mb-3" action="{{ route('user.profile') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname"
                        placeholder="Enter your first name" value="{{ old('fname') }}" autofocus required />
                    <small id="error" class="text-danger"></small>
                </div>
				<div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname"
                        placeholder="Enter your last name" value="{{ old('lname') }}" required />
                    <small id="error" class="text-danger"></small>
                </div>
				<div class="mb-3">
                    <label for="lname" class="form-label">Phone N0.</label>
					<div class="input-group">
						<div class="input-group-text">+234</div>
						<input type="tel" class="form-control" id="phone" name="phone"
                        placeholder="00000000000" value="{{ old('phone') }}" minlength="10" maxlength="10" required />
                    <small id="error" class="text-danger"></small>
					</div>
                </div>
				<div class="mb-3">
					<div class="form-check form-check-inline">
						<input class="form-check-input" {{ old('gender') == 'male' ? 'checked': ''}} name="gender" type="radio" id="male" value="male"/>
						<label class="form-check-label" for="male">male</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" {{ old('gender') == 'female' ? 'checked': ''}} name="gender" type="radio" id="female" value="female"/>
						<label class="form-check-label" for="female">female</label>
					</div>
				</div>

                <button class="btn btn-primary d-grid w-100">Update</button>
            </form>
        </div>
    </div>
</x-auth-layouts>
