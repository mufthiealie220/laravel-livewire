<div class="card border-0">
    <div class="card-header bg-indigo-600 text-white py-3 px-4 rounded-t-lg">
        <div class="flex justify-between items-center">
            <h4 class="card-title mb-0 font-semibold">Daftar Mata Kuliah</h4>
            <span class="text-sm bg-indigo-700 px-2 py-1 rounded-full">
                {{ $matakuliahList->total() }} Data
            </span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program Studi</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($matakuliahList as $matakuliah)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matakuliahList->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">{{ $matakuliah->kode }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $matakuliah->nama_matakuliah }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matakuliah->sks }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $matakuliah->semester }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $matakuliah->prodi->nama_prodi }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $matakuliah->id }})" 
                                    class="text-yellow-600 hover:text-yellow-900 mr-3"
                                    title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button wire:click="destroy({{ $matakuliah->id }})" 
                                    class="text-red-600 hover:text-red-900"
                                    title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data mata kuliah
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            {{ $matakuliahList->links() }}
        </div>
    </div>
</div>