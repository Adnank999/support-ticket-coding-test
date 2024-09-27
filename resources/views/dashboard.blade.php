<x-app-layout>
    <x-slot name="header" >
        <div class=" flex flex-row justify-center items-center gap-10">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ticket Issues') }}
            </h2>
            <div class="w-32 bg-transparent hover:border-2 hover:border-white hover:rounded-lg text-center px-3 py-1 whitespace-nowrap">
                <a href="{{ route('tickets.create') }}" class="font-semibold text-white hover:text-red-500 dark:text-red-600  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Create Ticket</a>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="z-index: 100;">

                    @if($tickets->isEmpty())
                    <p>{{ __('No tickets submitted yet.') }}</p>
                    @else

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Subject') }}</th>
                                <th class="px-4 py-2">{{ __('Description') }}</th>
                                <th class="px-4 py-2">{{ __('Response') }}</th>
                                <th class="px-4 py-2">{{ __('Response By') }}</th>
                                <th class="px-4 py-2">{{ __('Role') }}</th>
                                <th class="px-4 py-2">{{ __('Status') }}</th>
                                <th class="px-4 py-2">{{ __('Submitted At') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td class="border px-4 py-2">{{ $ticket->subject }}</td>
                                <td class="border px-4 py-2">{{ $ticket->description }}</td>
                                <td class="border px-4 py-2">{{ $ticket->response }}</td>
                                @if($ticket->responder)
                                <td class="border px-4 py-2">{{ $ticket->responder->name }}</td>
                                <td class="border px-4 py-2">

                                    {{ $ticket->responder->getRoleNames()->join(', ') }}
                                </td>
                                @else
                                <td class="border px-4 py-2">No response yet</td>
                                <td class="border px-4 py-2">-</td>
                                @endif
                                @if($ticket->status === 0)
                                <td class="border px-4 py-2">Closed</td>

                                @else
                                <td class="border px-4 py-2">Opened</td>

                                @endif
                                <td class="border px-4 py-2">{{ $ticket->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>


    </div>
</x-app-layout>