<div class="bg-gradient-to-br from-white via-gray-50 to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 shadow-xl rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    اسم المنتج
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    الفئة
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    سعر التكلفة
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    سعر البيع
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    الكمية
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    الوحدة
                </th>
                <th scope="col" class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-widest">
                    الإجراءات
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($products as $product)
            <tr class="hover:bg-blue-50 text-center dark:hover:bg-blue-900 transition-colors duration-150">
                <td class="px-4 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-gray-100">
                    {{ $product->name }}
                </td>
                <td class="px-4 py-4  whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                    {{ $product->category->name }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-green-700 dark:text-green-400 font-bold">
                    {{ number_format($product->cost_price, 2) }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-blue-700 dark:text-blue-400 font-bold">
                    {{ number_format($product->selling_price, 2) }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                    {{ $product->quantity }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                    {{ $product->unit }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-sm text-center">
                    <button wire:click="edit({{ $product->id }})" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">تعديل</button>
                    <button wire:click="delete({{ $product->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200 ml-4">حذف</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-6 whitespace-nowrap text-sm text-center text-gray-500 dark:text-gray-300 bg-gray-50 dark:bg-gray-800">
                    لا توجد منتجات لعرضها.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="p-4 flex justify-center">
        {{ $products->links() }}
    </div>
</div>