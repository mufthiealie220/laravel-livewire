<div class="card border-0">
    <div class="card-header bg-indigo-600 text-white py-3 px-4 rounded-t-lg">
        <div class="flex justify-between items-center">
            <h4 class="card-title mb-0 font-semibold">Daftar Fakultas</h4>
            <span class="text-sm bg-indigo-700 px-2 py-1 rounded-full">
                {{ $fakultasList->total() }} Data
            </span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Fakultas</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($fakultasList as $fakultas)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fakultasList->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $fakultas->nama_fakultas }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $fakultas->id }})" 
                                    class="text-yellow-600 hover:text-yellow-900 mr-3"
                                    title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="destroy({{ $fakultas->id }})" 
                                    class="text-red-600 hover:text-red-900"
                                    title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus fakultas ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data fakultas
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            {{ $fakultasList->links() }}
        </div>
    </div>
</div>