<x-app-layout>
    <div class="py-12 bg-gradient-to-r from-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Manajemen Mata Kuliah</h2>
                        <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                            <i class="fas fa-book mr-2"></i> Sistem Akademik
                        </div>
                    </div>
                    
                    @if(session()->has('message'))
                        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 border border-green-200 flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    @if(session()->has('error'))
                        <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-800 border border-red-200 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <livewire:matakuliah.index />
                </div>
            </div>
        </div>
    </div>
    
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <style>
            .form-input, .form-select {
                transition: all 0.2s ease-in-out;
            }
            .form-input:focus, .form-select:focus {
                box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            }
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        </style>
    @endpush
    
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                // Tambahkan custom script jika diperlukan
            });
        </script>
    @endpush
</x-app-layout>