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
                                            <a href="{{ url('admin/orders/' . $order->id) }}" class="btn btn-ghost"><i
                                                    class="fa-solid fa-eye"></i></a>
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
