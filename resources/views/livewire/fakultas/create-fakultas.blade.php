<div class="card border-0">
    <div class="card-header bg-blue-600 text-white py-3 px-4 rounded-t-lg">
        <h4 class="card-title mb-0 font-semibold">{{ $isEdit ? 'Edit Fakultas' : 'Tambah Fakultas Baru' }}</h4>
    </div>
    <div class="card-body p-4">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            <div class="mb-4">
                <label for="nama_fakultas" class="block text-sm font-medium text-gray-700 mb-1">Nama Fakultas</label>
                <input type="text" wire:model="nama_fakultas" 
                       class="form-input w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama_fakultas') border-red-500 @enderror" 
                       id="nama_fakultas"
                       placeholder="Masukkan nama fakultas">
                @error('nama_fakultas') 
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