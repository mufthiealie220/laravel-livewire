<div>
    <div class="card border-0">
        <div class="card-header bg-blue-600 text-white py-3 px-4 rounded-t-lg">
            <h4 class="card-title mb-0 font-semibold">{{ $isEdit ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah Baru' }}</h4>
        </div>
        <div class="card-body p-4">
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode Matakuliah</label>
                        <input type="text" wire:model="kode" 
                               class="form-input w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kode') border-red-500 @enderror" 
                               id="kode"
                               placeholder="Contoh: MK001">
                        @error('kode') 
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="nama_matakuliah" class="block text-sm font-medium text-gray-700 mb-1">Nama Matakuliah</label>
                        <input type="text" wire:model="nama_matakuliah" 
                               class="form-input w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_matakuliah') border-red-500 @enderror" 
                               id="nama_matakuliah"
                               placeholder="Masukkan nama matakuliah">
                        @error('nama_matakuliah') 
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="sks" class="block text-sm font-medium text-gray-700 mb-1">SKS</label>
                        <input type="number" wire:model="sks" min="1" max="6"
                               class="form-input w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sks') border-red-500 @enderror" 
                               id="sks">
                        @error('sks') 
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                        <select wire:model="semester" 
                                class="form-select w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('semester') border-red-500 @enderror" 
                                id="semester">
                            <option value="">Pilih Semester</option>
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('semester') 
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                    <select wire:model="prodi_id" 
                            class="form-select w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('prodi_id') border-red-500 @enderror" 
                            id="prodi_id">
                        <option value="">Pilih Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                    @error('prodi_id') 
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div class="flex space-x-3 mt-4">
                    <button type="submit" class="btn-primary px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update' : 'Simpan' }}
                    </button>
                    @if($isEdit)
                        <button type="button" wire:click="resetInput" 
                                class="btn-secondary px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Batal
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>