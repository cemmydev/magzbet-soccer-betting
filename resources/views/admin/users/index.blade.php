<div class="flex items-center justify-center dark:bg-darker text-sm">
	<div class="container">
        <p class="ml-3 font-bold text-"> {{strtoupper($tabIndex)}} TABLE</p>
		<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dark:bg-darker font-small">
			<thead class="text-white">
                @foreach($usersData as $user)
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left truncate">Email Verified</th>
                        <th class="p-3 text-left truncate">Status</th>
                        <th class="p-3 text-left truncate">Role</th>
                        <th class="p-3 text-left" width="110px">Actions</th>
                    </tr>
                @endforeach

			</thead>
			<tbody class="flex-1 sm:flex-none">
                @foreach($usersData as $user)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border p-3">{{$user['name']}}</td>
                        <td class="border-grey-light border p-3 truncate">{{$user['email']}}</td>
                        <td class="border-grey-light border p-3 truncate">{{date('d-m-Y', strtotime($user['email_verified_at']))}}</td>
                        <td class="border-grey-light border p-3 truncate">
                          @if(!$user->subscriptionPlans()) {{'not paid'}}
                          @elseif(!$user->unexpiredSubscription()) {{'expired'}}
                          @else {{'paid'}}
                          @endif
                        </td>
                        <td class="border-grey-light border p-3 truncate">
                          @foreach($user->roles as $role)
                            {{$role->name}}
                          @endforeach
                        </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                          <a href="{{route('admin.users.edit', $user->id)}}">edit</a>
                          <a href="{{route('admin.users.delete', $user->id)}}">delete</a>
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