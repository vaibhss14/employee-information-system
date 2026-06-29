<div class="max-w-screen-2xl mx-auto px-8 py-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-5xl font-bold text-slate-800">
                Attendance
            </h1>
        </div>

       @if(auth()->user()->role === 'admin')

<a href="/admin/attendances/create"
   class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl">
    + Mark Attendance
</a>

@elseif(auth()->user()->role === 'employee')

@if(!$hasMarkedToday)

<button
    wire:click="markAttendance"
    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl">
    Mark Today's Attendance
</button>

@else

<button
    disabled
    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl cursor-not-allowed">
    ✓ Attendance Marked
</button>

@endif

@endif

    </div>

    @if(session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
    {{ session('error') }}
</div>
@endif


<!--Attendance box-->
@if(auth()->user()->role === 'employee')

<div class="bg-teal-600 rounded-3xl shadow-xl p-8 mb-8 ">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-green-100 text-sm uppercase tracking-wider">
                Today's Attendance
            </p>

            <h2 class="text-4xl font-bold mt-2">
                {{ now()->format('d M Y') }}
            </h2>

            @if($hasMarkedToday)

                <div class="mt-6 items-center gap-2 bg-white text-green-700 px-2 py-2 rounded-full font-semibold shadow">

                    ✅ Present

                </div>

                <p class="mt-4 text-green-100">
                    Attendance marked successfully.
                </p>

                <p class="text-green-200 text-sm">
                    {{ $todayAttendance?->created_at?->format('h:i A') }}
                </p>

            @else

                <button
                    wire:click="markAttendance"
                    class="mt-6 bg-white text-green-700 font-semibold px-6 py-3 rounded-xl shadow hover:scale-105 transition">

                    ✔ Mark Today's Attendance

                </button>

            @endif

        </div>

        <div class="text-8xl opacity-100">
            📅
        </div>

    </div>

</div>

@endif



    <!-- Filters -->
    <div class="flex flex-wrap gap-4 mb-8">

        <input
            type="date"
            wire:model.live="selectedDate"
            class="border border-gray-300 rounded-lg px-4 py-2">

        @if(auth()->user()->role !== 'employee')
            <input
                type="text"
                wire:model.live="search"
                placeholder="Search employee..."
                class="border border-gray-300 rounded-lg px-4 py-2 w-72">
        @endif

    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Present</p>
            <h2 class="text-4xl font-bold text-green-600">
                {{ $attendances->where('status','present')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Absent</p>
            <h2 class="text-4xl font-bold text-red-500">
                {{ $attendances->where('status','absent')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Late</p>
            <h2 class="text-4xl font-bold text-yellow-500">
                {{ $attendances->where('status','late')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Total Records</p>
            <h2 class="text-4xl font-bold text-indigo-600">
                {{ $attendances->count() }}
            </h2>
        </div>

    </div>

    <!-- Attendance Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6">
            <h2 class="text-2xl font-bold">
                Attendance Records
            </h2>
        </div>

        <table class="w-full">

            <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Employee</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($attendances as $attendance)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4">
                            {{ $attendance->employee->name ?? 'N/A' }}
                        </td>

                        <td class="p-4">
                            {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}
                        </td>

                        <td class="p-4">

                            @if($attendance->status == 'present')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Present
                                </span>

                            @elseif($attendance->status == 'absent')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Absent
                                </span>

                            @elseif($attendance->status == 'late')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Late
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center py-10 text-gray-500">
                            No attendance records found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>