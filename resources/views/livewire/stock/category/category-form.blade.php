<div class="bg-white dark:bg-gray-900 p-6 rounded shadow">
    <form wire.submit='save'>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-200 mb-1">اسم الفئة</label>
            <input type="text" id="name" wire:model.defer='name' required
                class="w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-200 mb-1">(اختياري)الوصف</label>
            <textarea id="description" wire:model.defer='description' rows="3"
                class="w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-500"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-600 dark:bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 transition">حفظ الفئة</button>
        </div>
    </form>
</div>
