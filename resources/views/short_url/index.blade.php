<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-lg font-semibold mb-4">Urls</h3>
                    @if(auth()->user() && auth()->user()->role_id != 1)
                    <a href="{{ route('short-urls.create') }}" class="btn btn-danger">
                        {{ __('Add') }}
                    </a>
                    @endif
                </div>
                    
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @if(auth()->user()->role == 'superadmin')
                                            <th>Company</th>
                                        @endif
                                        <th>User</th>
                                        <th>Original URL</th>
                                        <th>Short URL</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($urls->count())    
                                    <?php $i = 1; ?>
                                    @foreach($urls as $url)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @if(auth()->user()->role == 'superadmin')
                                                <td>{{ $url->company->name ?? 'N/A' }}</td>
                                            @endif
                                            <td>{{ $url->user->name ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ $url->original_url }}" target="_blank">{{ Str::limit($url->original_url, 40) }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('short.redirect',[$url->short_code]) }}" target="_blank">{{ route('short.redirect',[$url->short_code]) }}</a>
                                            </td>
                                            <td>{{ $url->created_at->format('d M Y') }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    @else
                                        <tr><td colspan="10" align="center">No url's found.</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $urls->links() }}
                        </div>
                    
                
            </div>
        </div>
    </div>
</x-app-layout>
