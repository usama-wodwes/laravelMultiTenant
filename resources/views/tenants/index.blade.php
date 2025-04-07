<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link href="{{ route('tenants.create') }}" class="ml-4 float-right">Add Tenant</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <h1 class="text-2xl font-bold mb-6">Tenants</h1>

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-700 text-left text-sm uppercase tracking-wider">
                                        <th class="px-6 py-3">Name</th>
                                        <th class="px-6 py-3">Email</th>
                                        <th class="px-6 py-3">Domain</th>
                                        <th class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    {{-- {{ $tenants }} --}}
                                    @forelse ($tenants as $tenant)
                                        <tr class="border-t hover:bg-gray-50">
                                            <td class="px-6 py-4">{{ $tenant->name }}</td>
                                            <td class="px-6 py-4">{{ $tenant->email }}</td>

                                            <td class="px-6 py-4">
                                                @forelse ($tenant->domains as $domain)
                                                    {{ $domain->domain }}{{ !$loop->last ? ',' : '' }}
                                                @empty
                                                    N/A
                                                @endforelse

                                                {{-- {{ $tenant->domain->domain ?? 'N/A' }} --}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('tenants.edit', $tenant) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('tenants.destroy', $tenant) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-6 text-gray-500">No tenants found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
