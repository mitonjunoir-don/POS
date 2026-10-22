<x-layouts.app title="Add User">
    <div class="max-w-lg">
        <div class="card">
            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="mb-1 block text-sm font-medium text-ink-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full rounded-lg border-ink-200 text-sm">
                    @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-ink-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full rounded-lg border-ink-200 text-sm">
                    @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-ink-700">Password</label>
                    <input type="password" name="password"
                           class="w-full rounded-lg border-ink-200 text-sm">
                    @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-ink-700">Role</label>
                    <select name="role" class="w-full rounded-lg border-ink-200 text-sm">
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
                        <option value="cashier" {{ old('role') === 'cashier' ? 'selected' : '' }}>Cashier</option>
                    </select>
                    @error('role') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="btn-secondary">Create User</button>
                    <a href="{{ route('admin.users.index') }}" class="text-sm text-ink-500 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
