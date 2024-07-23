<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-yellow-50 w-1/3 text-center">Nama File</th>
                                    <th class="text-yellow-50 text-center">Tanggal Upload</th>
                                    <th class="text-yellow-50 text-center">Service</th>
                                    <th class="text-yellow-50 text-center">Notes</th>
                                    <th class="text-yellow-50 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->original_filename }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                                        <td>
                                            @if ($order->service->perapihan_paragraf)
                                                Perapihan Paragraf<br>
                                            @endif
                                            @if ($order->service->nomor_halaman)
                                                Nomor Halaman<br>
                                            @endif
                                            @if ($order->service->daftar_isi)
                                                Daftar Isi<br>
                                            @endif
                                            @if ($order->service->daftar_tabel)
                                                Daftar Tabel<br>
                                            @endif
                                            @if ($order->service->daftar_gambar)
                                                Daftar Gambar<br>
                                            @endif
                                            @if ($order->service->lainnya)
                                                Lainnya: {{ $order->service->lainnya }}<br>
                                            @endif
                                        </td>
                                        <td>{{ $order->note }}</td>
                                        <td>
                                            <a href="{{ Storage::url($order->filename) }}" class="btn btn-primary"
                                                download>Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
