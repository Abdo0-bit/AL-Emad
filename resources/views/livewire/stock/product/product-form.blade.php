<div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <div>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form wire:submit='save' class="space-y-6">
            <div>
                <label for="name" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">اسم المنتج</label>
                <input type="text" id="name" wire:model.defer='name' required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror 
            </div>
            <div>
                <label for="category_id" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">الفئة</label>
                <select id="category_id" wire:model.defer='category_id' required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">اختر فئة</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="cost_price" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">سعر التكلفة</label>
                <input type="number" id="cost_price" wire:model.defer='cost_price' step="0.01" required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                @error('cost_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="selling_price" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">سعر البيع</label>
                <input type="number" id="selling_price" wire:model.defer='selling_price' step="0.01" required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                @error('selling_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="quantity" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">الكمية</label>
                <input type="number" id="quantity" wire:model.defer='quantity' required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="unit" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">الوحدة</label>
                <input type="text" id="unit" wire:model.defer='unit' required
                    class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400 dark:bg-gray-900 dark:text-gray-100">
                @error('unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 dark:bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800 transition">حفظ المنتج</button>
            </div>
        </form>
    </div>
</div>
