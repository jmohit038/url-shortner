<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-lg font-semibold mb-4">Add User</h3>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">
                            {{ __('Back') }}
                        </a>
                    </div>
                    {{-- Form to Add Users --}}
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf  {{-- CSRF protection --}}
                        
                        {{-- Role Field --}}
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $key => $role)
                                    <option value="{{ $key }}">{{ ucwords($role) }}</option>
                                @endforeach
                            </select>

                            @error('role_id')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name..." class="form-control" required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Admin Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email..." class="form-control" required>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Invite
                            </button>
                        </div>
                    </form>

                
            </div>
        </div>
    </div>
</x-app-layout>
