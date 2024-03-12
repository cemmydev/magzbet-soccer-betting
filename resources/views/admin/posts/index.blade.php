<div class="flex items-center justify-center dark:bg-darker text-sm">
  <div class="container">
    <p class="ml-3 font-bold text-"> BETS TABLE</p>
    <div class="mt-4 text-right">
      <a href="{{route('admin.posts.create')}}" class="bg-primary text-white p-3"> + Create</a>
    </div>
    <table
      class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dark:bg-darker font-small">
      <thead class="text-white text-center">
        @foreach($posts as $post)
        <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
          <th class="p-3 text-left">Event</th>
          <th class="p-3 text-left">Description</th>
          <th class="p-3 text-left">Created at</th>
          <th class="p-3 text-left">Status</th>
          <th class="p-3 text-left" title = "Odds, Stake, Gain, Profit">Betting</th>
          <th class="p-3 text-left">Supscription</th>
          <th class="p-3 text-left" width="110px">Actions</th>
        </tr>
        @endforeach

      </thead>
      <tbody class="flex-1 sm:flex-none text-center">
        @foreach($posts as $post)
        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
          <td class="border-grey-light border hover:bg-gray-100 p-3">
            <b>{{$post['event']}}</b> at
            {{date('d-m-Y', strtotime($post['date']))}}
          </td>
          <td class="border-grey-light border hover:bg-gray-100 p-3">{{$post['description']}}</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{date('d-m-Y',
            strtotime($post['created_at']))}}</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$post['status']}}</td>
          <td class="border-grey-light border hover:bg-gray-100 p-3" title = "Odds, Stake, Gain, Profit">
            {{$post['odds']}},
            {{$post['stake']}},
            {{$post['gain']}},
            {{$post['profit']}}
          <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
            @foreach($post['subscription_plan'] as $sub)
              {{$sub['name'].' '}}
            @endforeach
          </td>
          <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
            <a href="{{route('admin.posts.edit', $post['id'])}}">Edit</a> , 
            <a href="{{route('admin.posts.delete', $post['id'])}}">Delete</a>
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