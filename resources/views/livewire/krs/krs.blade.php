<div class="container mx-auto px-4 py-8">
    @if (auth()->check() && $mahasiswa)
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Form Pengisian KRS</h2>
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            
            <p class="mb-4">Total SKS diambil: <strong>{{ $totalSKS }}</strong> (Maksimum: 24 SKS)</p>
            
            <form wire:submit.prevent="ambilKRS">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 mb-2">Pilih Mata Kuliah:</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($matakuliahTersedia as $matakuliah)
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="matakuliah-{{ $matakuliah->id }}" 
                                    wire:model="matakuliahDipilih" 
                                    value="{{ $matakuliah->id }}"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                >
                                <label for="matakuliah-{{ $matakuliah->id }}" class="ml-2">
                                    {{ $matakuliah->kode }} - {{ $matakuliah->nama_matakuliah }} ({{ $matakuliah->sks }} SKS)
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    {{ $totalSKS >= 24 ? 'disabled' : '' }}
                >
                    Simpan KRS
                </button>
            </form>
        </div>
        
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Daftar KRS Anda</h2>
            
            @if (count($daftarKRS) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Mata Kuliah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">SKS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($daftarKRS as $krs)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $krs->matakuliah->kode }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $krs->matakuliah->nama_matakuliah }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $krs->matakuliah->sks }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button 
                                            wire:click="batalkanKRS({{ $krs->id }})" 
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin membatalkan mata kuliah ini?')"
                                        >
                                            Batalkan
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600 dark:text-gray-400">Anda belum mengambil mata kuliah.</p>
            @endif
        </div>
    @else
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
            <p class="text-gray-600 dark:text-gray-400">Silakan login sebagai mahasiswa untuk mengakses KRS.</p>
        </div>
    @endif
</div>