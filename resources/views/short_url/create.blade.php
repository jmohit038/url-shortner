<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-lg font-semibold mb-4">Add Url</h3>
                        <a href="{{ route('short-urls.index') }}" class="btn btn-danger">
                        {{ __('Back') }}
                        </a>
                    </div>
                    {{-- Form to Add Url --}}
                    <form action="{{ route('short-urls.store') }}" method="POST">
                    @csrf  {{-- CSRF protection --}}
                    
                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" name="url" id="url" placeholder="Url..." class="form-control" required>
                        @error('url')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
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
