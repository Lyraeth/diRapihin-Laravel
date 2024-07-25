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
                    @endif

                    <form class="flex flex-col" action="{{ route('upload.handle') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex">
                            <div class="flex-1 w-1/2">
                                <div class="form-control w-full max-w-lg">
                                    <div class="label">
                                        <span for="file" class="label-text my-2 text-xl font-semibold">Choose
                                            file:</span>
                                        <span class="label-text-alt text-red-400">Required</span>
                                    </div>
                                    <input type="file" id="file" name="file" required
                                        class="file-input file-input-bordered w-full max-w-lg" />
                                    <div class="label">
                                        <span for="file" class="label-text-alt"></span>
                                        <span for="file" class="label-text-alt">.doc or .docx</span>
                                    </div>
                                </div>
                            </div>
                            <div class="divider divider-horizontal"></div>
                            <div class="flex-2 w-1/2">
                                <div class="form-control w-full max-w-lg">
                                    <div class="label">
                                        <span for="file" class="label-text my-2 text-xl font-semibold">Choose
                                            file Pedoman:</span>
                                        <span class="label-text-alt text-blue-400">Optional</span>
                                    </div>
                                    <input type="file" id="file_pedoman" name="file_pedoman"
                                        class="my-2 file-input file-input-bordered w-full max-w-lg" />
                                    <div class="label">
                                        <span for="file" class="label-text-alt"></span>
                                        <span for="file" class="label-text-alt">.doc or .docx or .pdf</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <label class="my-2">Choose services:</label>
                        <div class="my-2">
                            <label class="flex items-center my-2">
                                <input type="checkbox" name="services[]" value="perapihan_paragraf"
                                    class="checkbox checkbox-primary" />
                                <span class="ml-2">Perapihan Paragraf</span>
                            </label>
                            <label class="flex items-center my-2">
                                <input type="checkbox" name="services[]" value="nomor_halaman"
                                    class="checkbox checkbox-primary" />
                                <span class="ml-2">Nomor Halaman</span>
                            </label>
                            <label class="flex items-center my-2">
                                <input type="checkbox" name="services[]" value="daftar_isi"
                                    class="checkbox checkbox-primary" />
                                <span class="ml-2">Daftar Isi</span>
                            </label>
                            <label class="flex items-center my-2">
                                <input type="checkbox" name="services[]" value="daftar_tabel"
                                    class="checkbox checkbox-primary" />
                                <span class="ml-2">Daftar Tabel</span>
                            </label>
                            <label class="flex items-center my-2">
                                <input type="checkbox" name="services[]" value="daftar_gambar"
                                    class="checkbox checkbox-primary" />
                                <span class="ml-2">Daftar Gambar</span>
                            </label>
                        </div>
                        <div class="divider"></div>
                        <label for="note" class="my-2">Ada tambahan?</label>
                        <textarea id="note" name="note" class="textarea textarea-bordered my-2" placeholder="Catatan untuk admin"></textarea>

                        <div class="text-center">
                            <x-primary-button class="my-2">Upload</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ session('success') }}",
                });
            @endif
        });
    </script>
</x-app-layout>
