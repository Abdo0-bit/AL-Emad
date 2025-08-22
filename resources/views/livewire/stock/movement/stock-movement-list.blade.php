<div class="max-w-7xl mx-auto p-6 space-y-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 dark:from-indigo-700 dark:to-blue-700 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3 space-x-reverse">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h1 class="text-3xl font-bold">سجل حركات المخزون</h1>
                    <p class="text-indigo-100 dark:text-indigo-200 mt-1">عرض وإدارة جميع حركات المخزون</p>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class="flex space-x-4 space-x-reverse">
                <div class="bg-white/10 rounded-lg p-3 text-center min-w-[80px]">
                    <div class="text-2xl font-bold">{{ $totalInMovements }}</div>
                    <div class="text-xs text-indigo-100">إجمالي الداخل</div>
                </div>
                <div class="bg-white/10 rounded-lg p-3 text-center min-w-[80px]">
                    <div class="text-2xl font-bold">{{ $totalOutMovements }}</div>
                    <div class="text-xs text-indigo-100">إجمالي الخارج</div>
                </div>
                <div class="bg-white/10 rounded-lg p-3 text-center min-w-[80px]">
                    <div class="text-2xl font-bold">{{ $todayMovements }}</div>
                    <div class="text-xs text-indigo-100">اليوم</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-gray-900/50 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 flex items-center">
                <svg class="w-5 h-5 ml-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"/>
                </svg>
                تصفية النتائج
            </h2>
            <button wire:click="clearFilters" 
                    class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition duration-200 text-sm">
                مسح الفلاتر
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
            <!-- Search -->
            <div class="xl:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">البحث</label>
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" 
                           class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" 
                           placeholder="بحث في المنتجات، المستخدمين، أو الملاحظات...">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"/>
                    </svg>
                </div>
            </div>

            <!-- Movement Type Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع الحركة</label>
                <select wire:model.live="filterType" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="">جميع الأنواع</option>
                    <option value="in">إدخال</option>
                    <option value="out">إخراج</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الفئة</label>
                <select wire:model.live="filterCategory" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="">جميع الفئات</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Product Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">المنتج</label>
                <select wire:model.live="filterProduct" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="">جميع المنتجات</option>
                    @foreach($this->filteredProducts as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date Range -->
            <div class="xl:col-span-2 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">من تاريخ</label>
                    <input type="date" wire:model.live="filterDateFrom" 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">إلى تاريخ</label>
                    <input type="date" wire:model.live="filterDateTo" 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-gray-900/50 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">النتائج</h3>
            <div class="flex items-center space-x-3 space-x-reverse">
                <span class="text-sm text-gray-600 dark:text-gray-400">عرض</span>
                <select wire:model.live="perPage" 
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-sm text-gray-600 dark:text-gray-400">عنصر</span>
            </div>
        </div>

        <!-- Table Content -->
        @if($movements->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">التاريخ والوقت</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">المنتج</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">الفئة</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">نوع الحركة</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">الكمية</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">المستخدم</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">الملاحظات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-center">
                        @foreach($movements as $movement)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 text-center">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                        {{ $movement->created_at->format('d/m/Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $movement->created_at->format('g:i A') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $movement->product->name }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        المخزون الحالي: {{ $movement->product->quantity }} {{ $movement->product->unit ?? 'قطعة' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                        {{ $movement->product->category->name ?? 'غير محدد' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($movement->type === 'in')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/>
                                            </svg>
                                            إدخال
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"/>
                                            </svg>
                                            إخراج
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-bold {{ $movement->type === 'in' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                        {{ $movement->type === 'in' ? '+' : '-' }}{{ $movement->quantity }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center">
                                        <div class="w-8 h-8 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                {{ substr($movement->user->name ?? 'غير محدد', 0, 1) }}
                                            </span>
                                        </div>
                                        <div class="mr-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $movement->user->name ?? 'غير محدد' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate" title="{{ $movement->note }}">
                                        {{ $movement->note ?: '—' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $movements->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6 4h6m-6 4h6m6-16h6m-6 4h6m-6 4h6m-6 4h6"/>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">لا توجد حركات مخزون</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    @if($search || $filterType || $filterProduct || $filterCategory || $filterDateFrom || $filterDateTo)
                        لم يتم العثور على نتائج تطابق معايير البحث المحددة.
                    @else
                        لم يتم تسجيل أي حركات مخزون بعد.
                    @endif
                </p>
                @if($search || $filterType || $filterProduct || $filterCategory || $filterDateFrom || $filterDateTo)
                    <button wire:click="clearFilters" 
                            class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        مسح الفلاتر
                    </button>
                @endif
            </div>
        @endif
    </div>
</div>
