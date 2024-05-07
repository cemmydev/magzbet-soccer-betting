<form method="post" class="p-4">
    @csrf
    <p class="font-bold py-4">Edit User</p>
    @if ($errors->any())
        <ul class='text-danger-light'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <label for="user_edit_username">username</label>
    <input id="user_edit_username" class="block w-full p-2 dark:bg-darker" name="name" value="{{ $user['name'] }}"
        required />
    <label for="user_edit_event">email</label>
    <input id="user_edit_event" type="text" class="block w-full p-2 dark:bg-darker" name="email"
        value="{{ $user['email'] }}" required>
    <label for="user_edit_date">email_verified_at</label>
    <input id="user_edit_date" type="date" class="block w-full p-2 dark:bg-darker" name="email_verified_at"
        value="{{ date('Y-m-d', strtotime($user['email_verified_at'])) }}">
    @if(Auth::user()->isSuperAdmin())
    <label for="user_edit_role">roles</label>
    <select id="user_edit_role" class="block w-full p-2 dark:bg-darker" name="role">
        @foreach($roles as $role)
            <option value="{{$role->id}}" @if($user->hasRole($role->name)){{"selected"}}@endif>{{$role->name}}</option>
        @endforeach
    </select>
    @endif
    <button type="submit" class="button bg-primary p-4 text-white mt-2">Submit</button>
</form>
<p>available subscriptions</p>
<table
    class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden my-2 sm:shadow-lg dark:bg-darker font-small">
    <thead>
        @foreach ($user->unexpiredSubscription() as $item)
            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left">name</th>
                <th class="p-3 text-left">cost</th>
                <th class="p-3 text-left">start at</th>
                <th class="p-3 text-left">expire at</th>
                <th class="p-3 text-left">action</th>
            </tr>
        @endforeach
    </thead>
    <tbody class="flex-1 sm:flex-none">
        @if (!$user->unexpiredSubscription())
            <p class="font-bold">NONE</p>
        @else
            @foreach ($user->unexpiredSubscription() as $item)
                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                    <td class="border-grey-light border p-3">{{ $item['name'] }}</td>
                    <td class="border-grey-light border p-3">{{ $item['cost'] }}</td>
                    <td class="border-grey-light border p-3">{{ $item['pivot']['start_at'] }}</td>
                    <td class="border-grey-light border p-3">{{ $item['pivot']['expire_at'] }}</td>
                    <td class="border-grey-light border p-3">
                        <a href="{{ route('admin.users.expire', [$user['id'], $item['pivot']['id']]) }}"
                            class='text-red-600'>force expire</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<form action="{{route('admin.users.add', $user['id'])}}" method='post'>
    @csrf
    <span class="p-2 font-bold">Add Subscriptions</span>
    <select name="subscription_plan" id="" class="w-40 p-2 dark:bg-darker">
        @foreach($subscriptions as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="number" name='days' placeholder="Number of Days" class="p-2 dark:bg-darker">
    <button type="submit" class="button bg-primary p-2 text-white ml-2">Submit</button>
</form>
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
