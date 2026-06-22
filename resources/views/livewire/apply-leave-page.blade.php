<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8">

    <h2 class="text-3xl font-bold mb-6">
        Apply Leave
    </h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-5">

        <!-- Leave Type -->
        <div>
            <label class="block font-medium mb-2">
                Leave Type
            </label>

            <select wire:model="leave_type"
                class="w-full border rounded-lg p-3">

                <option value="">Select Leave Type</option>

                <option value="Sick Leave">
                    Sick Leave
                </option>

                <option value="Casual Leave">
                    Casual Leave
                </option>

                <option value="Annual Leave">
                    Annual Leave
                </option>

                <option value="Maternity Leave">
                    Maternity Leave
                </option>

            </select>
        </div>

        <!-- Start Date -->
        <div>
            <label class="block font-medium mb-2">
                Start Date
            </label>

            <input
                type="date"
                wire:model="start_date"
                class="w-full border rounded-lg p-3">
        </div>

        <!-- End Date -->
        <div>
            <label class="block font-medium mb-2">
                End Date
            </label>

            <input
                type="date"
                wire:model="end_date"
                class="w-full border rounded-lg p-3">
        </div>

        <!-- Reason -->
        <div>
            <label class="block font-medium mb-2">
                Reason
            </label>

            <textarea
                wire:model="reason"
                rows="4"
                class="w-full border rounded-lg p-3"></textarea>
        </div>

        <!-- Submit -->
        <button
            type="submit"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl">
            Submit Leave Request
        </button>

    </form>

</div>