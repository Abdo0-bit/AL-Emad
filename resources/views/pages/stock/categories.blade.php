<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">إضافة/تعديل فئة</h2>
                            @livewire('stock.category.category-form')
                        </div>
                        <div class="md:col-span-2">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">قائمة الفئات</h2>
                            @livewire('stock.category.category-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
