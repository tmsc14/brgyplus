<div class="requests-container">
    <x-icon-header text="Signup Requests" iconName='how-to-reg' />
    <ul class="nav nav-tabs brgy-nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="/requests">Requests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">History</a>
        </li>
    </ul>

    <x-container titleName="Requests" iconName="how-to-reg">
        <x-paginate-table :records="$requests">
            <thead>
                <tr class="text-light bg-brown-primary border-0">
                    <th class="p-2">Full Name</th>
                    <th class="p-2">User Type</th>
                    <th class="p-2">Position</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Date Requested</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr class="text-light bg-light-brown">
                        <td class="p-2">{{ $request->first_name }} {{ $request->middle_name }}
                            {{ $request->last_name }}</td>
                        <td class="p-2">{{ $request->user_type }}</td>
                        <td class="p-2">{{ $request->position }}</td>
                        <td class="p-2">{{ $request->status }}</td>
                        <td class="p-2">{{ $request->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-paginate-table>
    </x-container>
</div>
