<x-app-layout>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-lg font-semibold mb-4">Add Company</h3>
                    <a href="{{ route('companies.index') }}" class="btn btn-danger">
                        {{ __('Back') }}
                    </a>
                </div>
                    {{-- Form to Add Company --}}
                    <form action="{{ route('companies.store') }}" method="POST">
                        @csrf  {{-- CSRF protection --}}
                        
                        {{-- Company Name Field --}}
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" id="company_name" placeholder="Company Name..." class="form-control" required>
                            @error('company_name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Admin Name Field --}}
                        <div class="mb-3">
                            <label for="admin_name" class="form-label">Admin Name</label>
                            <input type="text" name="admin_name" id="admin_name" placeholder="Admin Name..." class="form-control" required>
                            @error('admin_name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Admin Email Field --}}
                        <div class="mb-3">
                            <label for="admin_email" class="form-label">Admin Email</label>
                            <input type="email" name="admin_email" id="admin_email" placeholder="Admin Email..." class="form-control" required>
                            @error('admin_email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
