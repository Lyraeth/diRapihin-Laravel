<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div>{{ session('success') }}</div>
                    @endif

                    <form class="flex flex-col" action="{{ route('upload.handle') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="file" class="my-2">Choose file:</label>
                        <input type="file" id="file" name="file" required
                            class="my-2 file-input file-input-bordered w-full max-w-md" />
                        <div class="divider"></div>
                        <label for="service" class="my-2">Choose service:</label>
                        <select id="service" name="service" class="select select-ghost w-full max-w-xs my-2">
                            <option disabled selected>Pilih Service yang kamu inginkan</option>
                            <option value="perapihan_paragraf">Perapihan Paragraf</option>
                            <option value="no_halaman">Nomor Halaman</option>
                            <option value="daftar_isi">Daftar Isi</option>
                            <option value="daftar_tabel">Daftar Tabel</option>
                            <option value="daftar_gambar">Daftar Gambar</option>
                        </select>
                        <div class="divider"></div>
                        <label for="note" class="my-2">Ada tambahan?</label>
                        <textarea id="note" name="note" class="textarea textarea-bordered my-2" placeholder="Catatan untuk admin:"></textarea>

                        <div class="text-center">
                            <x-primary-button class="my-2">Upload</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
