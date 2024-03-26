<div>
    <table
        class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden my-2 sm:shadow-lg dark:bg-darker font-small">
        <thead>
            @foreach ($texts as $text)
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    <th class="p-3 text-left w-30">field</th>
                    <th class="p-3 text-center">text</th>
                    <th class="p-3 text-center w-21">Actions</th>
                </tr>
            @endforeach
        </thead>
        <tbody class="flex-1 sm:flex-none">
            @if (!$texts)
                <p class="font-bold">NONE</p>
            @else
                @foreach ($texts as $item)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border p-3">{{ $item['field'] }}</td>
                        <td class="border-grey-light border p-3">{{ Str::of($item['text'])->limit(30) }}</td>
                        <td class="border-grey-light border p-3 flex justify-around">
                            <a href="{{route('admin.texts.edit', $item['id'])}}" class="text-red-400">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<style>
    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }

    td:not(:last-child) {
        border-bottom: 0;
    }

    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }

    td {
        text-align: center;
    }
</style>
