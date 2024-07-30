<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($detailOrders as $detailOrder)
                        <a href="{{ route('admin.orders') }}" class="btn btn-outline">
                            <i class="fa-solid fa-caret-left"></i>
                            Back
                        </a>
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
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Order ID</dt>
                                                <dd
                                                    class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    {{ $detailOrder->id }}</dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Invoice ID</dt>
                                                <dd
                                                    class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    {{ $detailOrder->invoice_id }}</dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Status</dt>
                                                <dd
                                                    class="flex justify-between text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    @if ($detailOrder->status == 'pending')
                                                        <a
                                                            class="inline-flex items-center rounded-md bg-red-200 px-4 py-1 text-xs font-bold text-gray-900 ring-1 ring-inset ring-gray-500/10">
                                                            Pending
                                                        </a>
                                                    @endif
                                                    @if ($detailOrder->status == 'process')
                                                        <a
                                                            class="inline-flex items-center rounded-md bg-blue-200 px-4 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                                            Process
                                                        </a>
                                                    @endif
                                                    @if ($detailOrder->status == 'complete')
                                                        <a
                                                            class="inline-flex items-center rounded-md bg-green-200 px-4 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                            Complete
                                                        </a>
                                                    @endif
                                                </dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Tanggal Order</dt>
                                                <dd
                                                    class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    {{ $detailOrder->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i T') }}
                                                </dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Service</dt>
                                                <dd
                                                    class="flex flex-col mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    @if ($detailOrder->service->perapihan_paragraf == 1)
                                                        <p>Perapihan Paragraf</p>
                                                    @endif
                                                    @if ($detailOrder->service->nomor_halaman == 1)
                                                        <p>Nomor Halaman</p>
                                                    @endif
                                                    @if ($detailOrder->service->daftar_isi == 1)
                                                        <p>Daftar Isi</p>
                                                    @endif
                                                    @if ($detailOrder->service->daftar_tabel == 1)
                                                        <p>Daftar Tabel</p>
                                                    @endif
                                                    @if ($detailOrder->service->daftar_gambar == 1)
                                                        <p>Daftar Gambar</p>
                                                    @endif
                                                </dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Notes</dt>
                                                <dd
                                                    class="mt-1 text-sm leading-6 text-gray-700 dark:text-zinc-100 sm:col-span-2 sm:mt-0">
                                                    {{ $detailOrder->note }}</dd>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-black dark:text-gray-400">
                                                    Attachments</dt>
                                                <dd class="mt-2 text-sm text-zinc-200 sm:col-span-2 sm:mt-0">
                                                    <ul role="list"
                                                        class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                        <li
                                                            class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                            <div class="flex w-0 flex-1 items-center">
                                                                <i class="text-blue-500 fa-solid fa-file-word"></i>
                                                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                    <span
                                                                        class="truncate font-medium text-gray-700 dark:text-gray-400">{{ $detailOrder->original_filename }}</span>
                                                                    <span
                                                                        class="flex-shrink-0 text-gray-700 dark:text-gray-400">{{ $detailOrder->formatted_file_size }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a title="Download"
                                                                    href="{{ Storage::url($detailOrder->filename) }}"
                                                                    class="btn ml-4" download><i
                                                                        class="fa-solid fa-download fa-bounce"></i></a>
                                                            </div>
                                                        </li>
                                                        @if ($detailOrder->filename_pedoman != null)
                                                            <li
                                                                class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                                <div class="flex w-0 flex-1 items-center">
                                                                    <i class="text-red-500 fa-solid fa-file-pdf"></i>
                                                                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                        <span
                                                                            class="truncate font-medium text-gray-700 dark:text-gray-400">{{ $detailOrder->original_filename_pedoman }}</span>
                                                                        <span
                                                                            class="flex-shrink-0 text-gray-700 dark:text-gray-400">{{ $detailOrder->formatted_file_size_pedoman }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-4 flex-shrink-0">
                                                                    <a title="Download"
                                                                        href="{{ Storage::url($detailOrder->filename_pedoman) }}"
                                                                        class="btn ml-4" download>
                                                                        <i class="fa-solid fa-download fa-bounce">
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
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
