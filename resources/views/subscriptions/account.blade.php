<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha Assinatura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    #ola, Lazaro Magaia aqui ficam as suas assinaturas

                    <table>
                        <thread>
                            <tr>
                                <th>Data</th>
                                <th>Preço</th>
                                <th>Download</th>
                            </tr>
                        </thread>
                        <tbody>
                            <tr>
                                @foreach ($invoices  as $invoice)
                                    <td>{{$invoice->date()->toFormattedDateString()}}</td>
                                    <td>{{$invoice->total()}}</td>
                                    <td>
                                        <a href="{{route('subscriptions.invoice.download',$invoice->id)}}"
                                            target="_blank">
                                        Download</a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
