<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900 dark:text-gray-100 text-2xl">
                    <div class="flex flex-row justify-between">
                        <div class="p-2 text-2xl text-black dark:text-white">
                            {{ __('Tabel Orders') }}
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-black dark:text-yellow-50 text-center">No</th>
                                    <th class="text-black dark:text-yellow-50 text-center">Invoice ID</th>
                                    <th class="text-black dark:text-yellow-50 w-1/3 text-center">Nama File</th>
                                    <th class="text-black dark:text-yellow-50 text-center">Tanggal</th>
                                    <th class="text-black dark:text-yellow-50 text-center">Jam</th>
                                    <th class="text-black dark:text-yellow-50 text-center">Status</th>
                                    <th class="text-black dark:text-yellow-50 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="hover">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $order->invoice_id }}</td>
                                        <td>{{ $order->original_filename }}</td>
                                        <td class="text-center">
                                            {{ $order->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                                        <td class="text-center">
                                            {{ $order->created_at->setTimezone('Asia/Jakarta')->format('H:i T') }}
                                        </td>
                                        <td class="text-center">
                                            @if ($order->status == 'pending')
                                                <a
                                                    class="inline-flex items-center rounded-md bg-red-200 px-4 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-500/10">
                                                    Pending
                                                </a>
                                            @endif
                                            @if ($order->status == 'process')
                                                <a
                                                    class="inline-flex items-center rounded-md bg-blue-200 px-4 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                                    Process
                                                </a>
                                            @endif
                                            @if ($order->status == 'complete')
                                                <a
                                                    class="inline-flex items-center rounded-md bg-green-200 px-4 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                    Complete
                                                </a>
                                            @endif
                                        </td>
                                        <td class="flex flex-row justify-center">
                                            <x-primary-button x-data="Detail Order" title="Detail Order"
                                                x-on:click.prevent="$dispatch('open-modal', 'detail-order-{{ $order->id }}')"
                                                class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300">
                                                <i class="fa-solid fa-eye"> </i>
                                            </x-primary-button>
                                            <x-modal name="detail-order-{{ $order->id }}" focusable>
                                                <form class="p-6">
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Detail Order') }}
                                                    </h2>
                                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                                        {{ __('Once you downloaded the file, status will be updated.') }}
                                                    </p>
                                                    <div class="divider"></div>
                                                    <div class="mt-4">
                                                        <div>
                                                            <div class="mt-3">
                                                                <dl>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Order ID</dt>
                                                                        <dd
                                                                            class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            {{ $order->id }}</dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Invoice ID</dt>
                                                                        <dd
                                                                            class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            {{ $order->invoice_id }}</dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Status</dt>
                                                                        <dd
                                                                            class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            @if ($order->status == 'pending')
                                                                                <a
                                                                                    class="inline-flex items-center rounded-md bg-red-200 px-4 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-500/10">
                                                                                    Pending
                                                                                </a>
                                                                            @endif
                                                                            @if ($order->status == 'process')
                                                                                <a
                                                                                    class="inline-flex items-center rounded-md bg-blue-200 px-4 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                                                                    Process
                                                                                </a>
                                                                            @endif
                                                                            @if ($order->status == 'complete')
                                                                                <a
                                                                                    class="inline-flex items-center rounded-md bg-green-200 px-4 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                                                    Complete
                                                                                </a>
                                                                            @endif
                                                                        </dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Tanggal Order</dt>
                                                                        <dd
                                                                            class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            {{ $order->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i T') }}
                                                                        </dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Service</dt>
                                                                        <dd
                                                                            class="flex flex-col mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            @if ($order->service->perapihan_paragraf == 1)
                                                                                <p>Perapihan Paragraf</p>
                                                                            @endif
                                                                            @if ($order->service->nomor_halaman == 1)
                                                                                <p>Nomor Halaman</p>
                                                                            @endif
                                                                            @if ($order->service->daftar_isi == 1)
                                                                                <p>Daftar Isi</p>
                                                                            @endif
                                                                            @if ($order->service->daftar_tabel == 1)
                                                                                <p>Daftar Tabel</p>
                                                                            @endif
                                                                            @if ($order->service->daftar_gambar == 1)
                                                                                <p>Daftar Gambar</p>
                                                                            @endif
                                                                        </dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Notes</dt>
                                                                        <dd
                                                                            class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                                            {{ $order->note }}</dd>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div
                                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                                        <dt
                                                                            class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                                            Attachments</dt>
                                                                        <dd
                                                                            class="mt-2 text-sm text-zinc-200 sm:col-span-2 sm:mt-0">
                                                                            <ul role="list"
                                                                                class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                                                <li
                                                                                    class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                                                    <div
                                                                                        class="flex w-0 flex-1 items-center">
                                                                                        <i
                                                                                            class="text-blue-500 fa-solid fa-file-word"></i>
                                                                                        <div
                                                                                            class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                                            <span
                                                                                                class="truncate font-medium text-gray-700 dark:text-gray-400">{{ $order->original_filename }}</span>
                                                                                            <span
                                                                                                class="flex-shrink-0 text-gray-700 dark:text-gray-400">{{ $order->formatted_file_size }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="ml-4 flex-shrink-0">
                                                                                        <a title="Download"
                                                                                            href="{{ Storage::url($order->filename) }}"
                                                                                            class="btn ml-4" download><i
                                                                                                class="fa-solid fa-download fa-bounce"></i></a>
                                                                                    </div>
                                                                                </li>
                                                                                @if ($order->filename_pedoman != null)
                                                                                    <li
                                                                                        class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                                                        <div
                                                                                            class="flex w-0 flex-1 items-center">
                                                                                            <i
                                                                                                class="text-red-500 fa-solid fa-file-pdf"></i>
                                                                                            <div
                                                                                                class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                                                <span
                                                                                                    class="truncate font-medium text-gray-700 dark:text-gray-400">{{ $order->original_filename_pedoman }}</span>
                                                                                                <span
                                                                                                    class="flex-shrink-0 text-gray-700 dark:text-gray-400">{{ $order->formatted_file_size_pedoman }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ml-4 flex-shrink-0">
                                                                                            <a title="Download"
                                                                                                href="{{ Storage::url($order->filename_pedoman) }}"
                                                                                                class="btn ml-4"
                                                                                                download>
                                                                                                <i
                                                                                                    class="fa-solid fa-download fa-bounce">
                                                                                                </i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            </ul>
                                                                        </dd>
                                                                    </div>
                                                                </dl>
                                                            </div>
                                                        </div>
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
