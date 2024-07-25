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
                                    <th class="text-yellow-50 text-center">Tanggal</th>
                                    <th class="text-yellow-50 text-center">Jam</th>
                                    <th class="text-yellow-50 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="hover">
                                        <td>{{ $order->original_filename }}</td>
                                        <td class="text-center">
                                            {{ $order->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                                        <td class="text-center">
                                            {{ $order->created_at->setTimezone('Asia/Jakarta')->format('H:i T') }}
                                        </td>
                                        <td class="flex flex-row justify-center">
                                            <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'detail-order-{{ $order->id }}')"><i
                                                    class="fa-solid fa-eye"></i></x-primary-button>

                                            <x-modal name="detail-order-{{ $order->id }}" focusable>
                                                <form class="p-6">
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Detail Order') }}
                                                    </h2>
                                                    <div class="divider"></div>

                                                    {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                    </p> --}}

                                                    <div class="mt-4">
                                                        <div class="label my-2">
                                                            <span
                                                                class="label-text block text-sm font-medium text-zinc-200">Filename:</span>
                                                        </div>

                                                        <div class="flex flex-row">
                                                            <input type="text"
                                                                placeholder="{{ $order->original_filename }}"
                                                                class="input input-bordered w-full max-w-s" disabled />
                                                            <a href="{{ Storage::url($order->filename) }}"
                                                                class="btn ml-4" download><i
                                                                    class="fa-solid fa-download"></i></a>
                                                        </div>

                                                        <div class="label my-2">
                                                            <span
                                                                class="label-text block text-sm font-medium text-zinc-200">Tanggal
                                                                Order:</span>
                                                        </div>
                                                        <input type="text"
                                                            placeholder="{{ $order->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i T') }}"
                                                            class="input input-bordered w-full max-w-s" disabled />

                                                        <div class="label my-2">
                                                            <span
                                                                class="label-text block text-sm font-medium text-zinc-200">Service:</span>
                                                        </div>
                                                        <table class="table">
                                                            <thead class="text-center">
                                                                @if ($order->service->perapihan_paragraf == 1)
                                                                    <th>Perapihan Paragraf</th>
                                                                @endif
                                                                @if ($order->service->nomor_halaman == 1)
                                                                    <th>Nomor Halaman</th>
                                                                @endif
                                                                @if ($order->service->daftar_isi == 1)
                                                                    <th>Daftar Isi</th>
                                                                @endif
                                                                @if ($order->service->daftar_tabel == 1)
                                                                    <th>Daftar Tabel</th>
                                                                @endif
                                                                @if ($order->service->daftar_gambar == 1)
                                                                    <th>Daftar Gambar</th>
                                                                @endif
                                                            </thead>
                                                            <tbody class="text-center">
                                                                @if ($order->service->perapihan_paragraf == 1)
                                                                    <td>Yes</td>
                                                                @endif
                                                                @if ($order->service->nomor_halaman == 1)
                                                                    <td>Yes</td>
                                                                @endif
                                                                @if ($order->service->daftar_isi == 1)
                                                                    <td>Yes</td>
                                                                @endif
                                                                @if ($order->service->daftar_tabel == 1)
                                                                    <td>Yes</td>
                                                                @endif
                                                                @if ($order->service->daftar_gambar == 1)
                                                                    <td>Yes</td>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                        <div class="label my-2">
                                                            <span
                                                                class="label-text block text-sm font-medium text-zinc-200">Notes:</span>
                                                        </div>
                                                        <textarea id="note" name="note" class="textarea textarea-bordered my-2 w-full"
                                                            placeholder="{{ $order->note }}" disabled></textarea>
                                                    </div>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Close') }}
                                                        </x-secondary-button>
                                                    </div>
                                                </form>
                                            </x-modal>
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
