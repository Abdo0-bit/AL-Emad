<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
    @foreach($categories as $category)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg dark:shadow-gray-900/30 p-5 flex flex-col items-center w-full transition-all duration-300 hover:transform hover:scale-105 border border-gray-100 dark:border-gray-700">
        <div class="text-xl font-bold mb-3 text-gray-800 dark:text-gray-100">{{ $category->name }}</div>
        <div class="text-gray-600 dark:text-gray-300 text-sm text-center leading-relaxed">{{ $category->description }}</div>
        <div class="w-full mt-4 pt-4 border-t border-gray-100 dark:border-gray-700 flex justify-end">
            <a href="{{ route('stock.products.category', $category->id) }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium transition-colors inline-block">
                عرض المنتجات
            </a>
        </div>
    </div>
    @endforeach
</div>