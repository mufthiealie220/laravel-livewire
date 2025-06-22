<!-- resources/views/livewire/show-mahasiswa.blade.php -->
<div>
    <div class="mb-4 bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Filter Mahasiswa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="fakultas" class="block text-sm font-medium text-gray-700">Fakultas</label>
                <select wire:model.live="fakultasFilter" id="fakultas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Semua Fakultas</option>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                <select wire:model.live="semesterFilter" id="semester" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Semua Semester</option>
                    @foreach($semesters as $semester)
                        <option value="{{ $semester }}">Semester {{ $semester }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-lg font-semibold mb-4">Daftar Mahasiswa</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fakultas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total SKS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->nim }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->prodi->fakultas->nama_fakultas ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->total_sks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
</div>