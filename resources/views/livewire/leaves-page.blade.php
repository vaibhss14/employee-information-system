

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-5xl font-bold text-slate-800">
                Leaves
            </h1>

            <p class="text-slate-500 mt-2">
                Manage employee leave requests.
            </p>
        </div>

      @if(auth()->user()->role === 'admin')
    <a href="{{ route('leave.apply') }}"
       class="bg-orange-500 text-white px-6 py-3 rounded-xl">
        + Apply Leave
    </a>
@endif

    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Approved</p>
            <h2 class="text-4xl font-bold text-green-600">
                {{ $leaves->where('status','Approved')->count() }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Pending</p>
            <h2 class="text-4xl font-bold text-yellow-500">
                {{ $leaves->where('status','Pending')->count() }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Rejected</p>
            <h2 class="text-4xl font-bold text-red-500">
                {{ $leaves->where('status','Rejected')->count() }}
            </h2>
        </div>

    </div>

    <!-- Leave Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-6">
            <h2 class="text-2xl font-bold">
                Leave Requests
            </h2>
        </div>

        <table class="w-full">

            <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Employee</th>
                    <th class="p-4 text-left">Leave Type</th>
                    <th class="p-4 text-left">Start Date</th>
                    <th class="p-4 text-left">End Date</th>
                    @if(auth()->user()->role === 'admin')
    <th class="p-4 text-center w-40">Actions</th>
@endif

                </tr>
            </thead>

            <tbody>

                @foreach($leaves as $leave)

                <tr class="border-b">

                   <td class="p-4">
    {{ $leave->employee->name ?? 'N/A' }}
</td>

<td class="p-4">
    {{ $leave->leave_type }}
</td>

<td class="p-4">
    {{ $leave->start_date }}
</td>

<td class="p-4">
    {{ $leave->end_date }}
</td>

                    <td class="p-4">

                        @if($leave->status == 'Approved')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Approved
                            </span>
                        @elseif($leave->status == 'Pending')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                Pending
                            </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                Rejected
                            </span>
                        @endif

                    </td>

                    <td class="p-4 whitespace-nowrap">

@if(auth()->user()->role === 'admin')

    <button
        wire:click="approve({{ $leave->id }})"
        class="bg-green-600 text-white text-xs px-2 py-1 rounded">
        Approve
    </button>

    <button
        wire:click="reject({{ $leave->id }})"
        class="bg-yellow-600 text-white text-xs px-2 py-1 rounded ml-1">
        Reject
    </button>

    <button
        wire:click="delete({{ $leave->id }})"
        class="bg-red-600 text-white text-xs px-2 py-1 rounded ml-1">
        Delete
    </button>

@endif

</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>