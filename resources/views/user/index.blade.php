<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-lg font-semibold mb-4">Users</h3>
                        @if(auth()->user() && auth()->user()->role_id != 1)
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            {{ __('Add User') }}
                        </a>
                        @endif
                    </div>
                    
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Company</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($users->count())
                                    <?php $i = 1; ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><?php echo $user->role_id == 2 ? "Admin" : "Member"; ?></td>
                                            <td>{{ $user->company->name }}</td>
                                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @else
                                    <tr><td colspan="10" align="center">No user's found.</td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    
                
            </div>
        </div>
    </div>
</x-app-layout>
