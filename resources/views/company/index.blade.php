<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-lg font-semibold">Companies</h3>
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">
                            {{ __('Add') }}
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($companies->count())
                                    <?php $i = 1; ?>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    @else
                                    <tr><td colspan="10" align="center">No companies found.</td></tr>
                                    <p></p>
                                @endif
                                </tbody>
                                
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $companies->links() }}
                        </div>
                    
                
            </div>
        </div>
    </div>
</x-app-layout>
