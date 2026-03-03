<x-support-panel>

    @section('title', 'Tickets')

    <div class="flow-root px-2 mb-16">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="relative min-w-full divide-y divide-gray-300 mb-4">
                    <thead class="border-b border-gray-200 text-sm/6 text-gray-900">
                        <tr>
                            <th scope="col" class="py-2 text-left pr-8 pl-4 font-semibold sm:pl-6 lg:pl-8">
                                Usuario
                            </th>
                            <th scope="col" class="py-2 text-left pr-8 pl-4 font-semibold sm:pl-6 lg:pl-8">
                                Asunto
                            </th>
                            <th scope="col" class="py-2 text-left pr-8 pl-0 font-semibold">
                                Estado
                            </th>
                            <th scope="col"
                                class="py-2 text-left pr-4 pl-0 font-semibold sm:pr-8 lg:pr-20">
                                Prioridad
                            </th>
                            <th scope="col" class="py-2 text-left pr-8 pl-0 font-semibold md:table-cell lg:pr-20">
                                Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @for ($i = 0; $i < 10; $i++)
                            <tr>
                                @php
                                    $name = fake()->name();
                                @endphp
                                <td class="py-4 pr-8 pl-4 sm:pl-6 lg:pl-8">
                                    <div class="flex items-center gap-x-4">
                                        <img src="https://ui-avatars.com/api/?name={{ $name }}&color=fff&background=1b94ff"
                                            alt="" class="size-8 rounded-full bg-gray-100" />
                                        <div class="truncate text-sm/6 font-medium text-gray-900">
                                            {{ $name }}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 pr-8 pl-4 sm:pl-6 lg:pl-8">
                                    <div class="flex gap-x-3">
                                        <div class="rounded-md bg-gray-100 px-2 py-1 text-xs whitespace-nowrap
                                        font-medium text-gray-600 outline-1 outline-gray-200">
                                            {{ fake()->randomElement(['Facturación', 'Problema Técnico', 'Consulta']) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 pr-4 pl-0 text-sm/6 sm:pr-8 lg:pr-20">
                                    <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                                        <div class="text-gray-900">
                                            {{ fake()->randomElement(['Cerrado', 'Pendiente', 'En curso']) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 pr-8 pl-0 text-sm/6 text-gray-500 lg:pr-20">
                                    {{ fake()->randomElement(['Alta', 'Media', 'Baja']) }}
                                </td>
                                <td class="py-4 pr-4 pl-0 text-sm/6 text-gray-500 lg:pr-8">
                                    <time datetime="2023-01-23T11:00">
                                        {{ fake()->dateTimeThisYear()->format('d/m/Y H:i:s') }}
                                    </time>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-support-panel>
