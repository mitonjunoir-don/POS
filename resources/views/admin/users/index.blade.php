<x-layouts.app title="Manage Users">
    @if (session('status'))
        <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-ink-900">Users</h2>
        <a href="{{ route('admin.users.create') }}" class="btn-secondary">Add User</a>
    </div>

    <div class="card overflow-hidden p-0">
        <table class="w-full text-sm">
            <thead class="bg-ink-50 text-left text-xs uppercase tracking-wide text-ink-500">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink-100">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-3 text-ink-900">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-ink-500">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-ink-500">{{ $user->role->label() }}</td>
                        <td class="px-4 py-3">
                            <span class="{{ $user->is_active ? 'text-green-600' : 'text-red-600' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <form method="POST" action="{{ route('admin.users.toggle-active', $user) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-sm font-medium text-brand-700 hover:underline">
                                    {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
