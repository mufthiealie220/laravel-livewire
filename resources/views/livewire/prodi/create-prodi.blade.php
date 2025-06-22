<!-- file name: create-prodi.blade.php -->

<div> <!-- Ini adalah root element yang wajib ada -->
    <div class="card border-0">
        <div class="card-header bg-blue-600 text-white py-3 px-4 rounded-t-lg">
            <h4 class="card-title mb-0 font-semibold">{{ $isEdit ? 'Edit Program Studi' : 'Tambah Program Studi Baru' }}</h4>
        </div>
        <div class="card-body p-4">
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="mb-4">
                    <label for="nama_prodi" class="block text-sm font-medium text-gray-700 mb-1">Nama Program Studi</label>
                    <input type="text" wire:model="nama_prodi" 
                           class="form-input w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_prodi') border-red-500 @enderror" 
                           id="nama_prodi"
                           placeholder="Masukkan nama program studi">
                    @error('nama_prodi') 
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="fakultas_id" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                    <select wire:model="fakultas_id" 
                            class="form-select w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('fakultas_id') border-red-500 @enderror" 
                            id="fakultas_id">
                        <option value="">Pilih Fakultas</option>
                        @foreach($fakultas as $fak)
                            <option value="{{ $fak->id }}">{{ $fak->nama_fakultas }}</option>
                        @endforeach
                    </select>
                    @error('fakultas_id') 
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div class="flex space-x-3">
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
</div> <!-- Penutup root element -->