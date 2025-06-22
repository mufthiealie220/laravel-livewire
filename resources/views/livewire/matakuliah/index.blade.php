<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
            @if(session()->has('message'))
                <div class="alert alert-success mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-200">
                    {{ session('message') }}
                </div>
            @endif
            <livewire:matakuliah.create-matakuliah>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
            <livewire:matakuliah.show-matakuliah>
        </div>
    </div>
</div>