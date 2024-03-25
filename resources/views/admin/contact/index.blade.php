<div class="flex items-center justify-center dark:bg-darker text-sm">
	<div class="container">
        <p class="ml-3 font-bold text-lg"> Contacts</p>
		<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dark:bg-darker font-small">
			<thead class="text-white">
                @foreach($data as $item)
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Subject</th>
                        <th class="p-3 text-left">Message</th>
                        <th class="p-3 text-left">Created at</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                @endforeach

			</thead>
			<tbody class="flex-1 sm:flex-none">
                @foreach($data as $item)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border p-3">{{$item['email']}}</td>
                            <td class="border-grey-light border p-3">{{$item['subject']}}</td>
                            <td class="border-grey-light border p-3 ">{{strlen($item['message']) < 20 ? $item['message'] : $item['message'] = substr($item['message'], 0, 20).'.....'}}</td>
                            <td class="border-grey-light border p-3 truncate">{{date('d-m-Y', strtotime($item['created_at']))}}</td>
                            <td class="border-grey-light border p-3 truncate">
                                <a href="{{route('admin.singlecontact', $item['id'])}}">
                                    View
                                </a>
                            </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>
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

</style>