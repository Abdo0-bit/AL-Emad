<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-gray-900 dark:via-blue-900/20 dark:to-indigo-900/20">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 dark:from-blue-800 dark:via-purple-800 dark:to-indigo-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-white mb-3">إدارة الديون</h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">إضافة عملاء جدد وتسجيل عمليات الديون بطريقة سهلة ومنظمة</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-12">
        <!-- Alert Messages -->
        @if (session()->has('success'))
        <div class="mb-8 animate-pulse">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/20 border border-green-200 dark:border-green-700 rounded-xl p-4 shadow-lg backdrop-blur-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-800/50 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6 text-green-600 dark:text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-lg font-semibold text-green-800 dark:text-green-200">تم بنجاح!</h3>
                        <p class="text-green-700 dark:text-green-300">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="mb-8 animate-pulse">
            <div class="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/30 dark:to-pink-900/20 border border-red-200 dark:border-red-700 rounded-xl p-4 shadow-lg backdrop-blur-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-100 dark:bg-red-800/50 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="mr-4">
                        <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">خطأ!</h3>
                        <p class="text-red-700 dark:text-red-300">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Add Customer Section -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-emerald-500 via-green-500 to-teal-500 dark:from-emerald-600 dark:via-green-600 dark:to-teal-600 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">إضافة عميل جديد</h2>
                            <p class="text-green-100 text-sm">أضف عميل جديد للنظام</p>
                        </div>
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <form wire:submit.prevent='createCustomer' class="space-y-6">
                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <svg class="w-4 h-4 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                اسم العميل
                            </label>
                            <input type="text" wire:model='name' placeholder="ادخل اسم العميل بالكامل..."
                                class="w-full px-4 py-4 border-2 border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-right text-lg font-medium">
                            @error('name') 
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <svg class="w-4 h-4 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                رقم الهاتف
                            </label>
                            <input type="text" wire:model='phone' placeholder="ادخل رقم الهاتف (اختياري)..."
                                class="w-full px-4 py-4 border-2 border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-right text-lg font-medium">
                            @error('phone') 
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-500 via-green-500 to-teal-500 hover:from-emerald-600 hover:via-green-600 hover:to-teal-600 dark:hover:from-emerald-700 dark:hover:via-green-700 dark:hover:to-teal-700 text-white py-4 px-6 rounded-xl transition-all duration-200 font-semibold text-lg flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            إضافة العميل
                        </button>
                    </form>
                </div>
            </div>

            <!-- Debt Management Section -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/50 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 dark:from-blue-600 dark:via-indigo-600 dark:to-purple-600 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">تسجيل دين جديد</h2>
                            <p class="text-blue-100 text-sm">سجل عملية دين جديدة لعميل موجود</p>
                        </div>
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <form wire:submit.prevent="createDebt" class="space-y-8">
                        <!-- Customer Selection -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <svg class="w-4 h-4 ml-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                البحث عن العميل
                            </label>
                            <div class="relative">
                                <input type="search" wire:model.live="search" placeholder="ابحث بالاسم أو رقم الهاتف..."
                                    class="w-full px-4 py-4 pr-12 border-2 border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:placeholder-gray-400 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-right text-lg">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                    <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            @if($search && $customers->count() > 0)
                            <div class="mt-3 bg-white dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl shadow-lg max-h-64 overflow-y-auto">
                                @foreach ($customers as $customer)
                                <div wire:click="$set('customer_id', '{{ $customer->id }}')"
                                    class="px-6 py-4 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 cursor-pointer border-b border-gray-100 dark:border-gray-600 last:border-b-0 transition-all duration-200">
                                    <div class="flex justify-between items-center">
                                        <div class="text-right">
                                            <div class="font-semibold text-gray-900 dark:text-gray-100 text-lg">{{ $customer->name }}</div>
                                            @if($customer->phone)
                                            <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center justify-end">
                                                <span>{{ $customer->phone }}</span>
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                            </div>
                                            @endif
                                        </div>
                                        @if($customer_id == $customer->id)
                                        <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @elseif($search && $customers->count() == 0)
                            <div class="mt-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-6 text-center">
                                <svg class="w-12 h-12 text-gray-400 dark:text-gray-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 font-medium">لا توجد نتائج للبحث "{{ $search }}"</p>
                                <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">جرب مصطلح بحث آخر أو أضف عميل جديد</p>
                            </div>
                            @endif

                            @if($customer_id)
                            @php
                            $selectedCustomer = $customers->where('id', $customer_id)->first() ?: \App\Models\Customer::find($customer_id);
                            @endphp
                            @if($selectedCustomer)
                            <div class="mt-4 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/20 border-2 border-blue-200 dark:border-blue-700 rounded-xl p-4 shadow-sm">
                                <div class="flex justify-between items-center">
                                    <div class="text-right">
                                        <div class="font-semibold text-blue-900 dark:text-blue-200 text-lg flex items-center justify-end">
                                            <span>العميل المختار: {{ $selectedCustomer->name }}</span>
                                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        @if($selectedCustomer->phone)
                                        <div class="text-sm text-blue-700 dark:text-blue-400 mt-1">{{ $selectedCustomer->phone }}</div>
                                        @endif
                                    </div>
                                    <button type="button" wire:click="$set('customer_id', '')"
                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 p-2 hover:bg-blue-100 dark:hover:bg-blue-800/50 rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @endif
                            @endif
                            @error('customer_id') 
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Items Section -->
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                                    <svg class="w-6 h-6 ml-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    الأصناف والمنتجات
                                </h3>
                                <span class="text-sm text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full">
                                    {{ count($items) }} {{ count($items) === 1 ? 'صنف' : 'أصناف' }}
                                </span>
                            </div>

                            <div class="space-y-6">
                                @foreach ($items as $index => $item)
                                <div class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-700/50 dark:to-blue-900/20 rounded-xl p-6 border-2 border-gray-200 dark:border-gray-700 hover:shadow-lg transition-all duration-200">
                                    <div class="flex items-center justify-between mb-4">
                                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 flex items-center">
                                            <span class="w-8 h-8 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center text-purple-600 dark:text-purple-400 text-sm font-bold ml-2">
                                                {{ $index + 1 }}
                                            </span>
                                            صنف رقم {{ $index + 1 }}
                                        </h4>
                                        @if(count($items) > 1)
                                        <button type="button" wire:click="removeItem({{ $index }})"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 dark:bg-red-900/50 dark:text-red-300 dark:hover:bg-red-900/70 border border-red-200 dark:border-red-700 rounded-lg transition-all duration-200">
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            حذف الصنف
                                        </button>
                                        @endif
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div class="lg:col-span-2">
                                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                                <svg class="w-4 h-4 ml-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                                اسم الصنف
                                            </label>
                                            <input type="text" wire:model='items.{{ $index }}.item_name' placeholder="أدخل اسم الصنف..."
                                                class="w-full px-4 py-3 border-2 border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200 dark:placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-right font-medium">
                                            @error('items.' . $index . '.item_name') 
                                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                                <svg class="w-4 h-4 ml-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                                </svg>
                                                الكمية
                                            </label>
                                            <input type="number" wire:model='items.{{ $index }}.quantity' placeholder="0" min="1"
                                                class="w-full px-4 py-3 border-2 border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200 dark:placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-right font-medium">
                                            @error('items.' . $index . '.quantity') 
                                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="flex items-center text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                                <svg class="w-4 h-4 ml-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                                سعر الوحدة
                                            </label>
                                            <input type="number" wire:model='items.{{ $index }}.unit_price' placeholder="0.00" min="0" step="0.01"
                                                class="w-full px-4 py-3 border-2 border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200 dark:placeholder-gray-400 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-right font-medium">
                                            @error('items.' . $index . '.unit_price') 
                                                <p class="text-red-500 text-xs mt-2 flex items-center">
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Item Total -->
                                    <div class="mt-4 p-4 bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-purple-900/20 dark:to-indigo-900/20 rounded-lg border border-purple-200 dark:border-purple-700">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium text-purple-700 dark:text-purple-300 flex items-center">
                                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                المجموع الفرعي لهذا الصنف
                                            </span>
                                            <span class="text-xl font-bold text-purple-800 dark:text-purple-200">
                                                {{ number_format(($item['quantity'] ?? 0) * ($item['unit_price'] ?? 0), 2) }} ج.م
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Add Item Button -->
                            <div class="flex justify-center">
                                <button type="button" wire:click="addItem"
                                    class="inline-flex items-center px-6 py-3 text-sm font-semibold text-green-700 bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 dark:bg-green-900/50 dark:text-green-300 dark:hover:bg-green-900/70 border-2 border-green-300 dark:border-green-700 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md transform hover:scale-105">
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    إضافة صنف آخر
                                </button>
                            </div>

                            <!-- Grand Total -->
                            <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 dark:from-blue-600 dark:via-indigo-600 dark:to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-semibold mb-1">المجموع الكلي للعملية</h3>
                                        <p class="text-blue-100 text-sm">إجمالي قيمة جميع الأصناف</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-3xl font-bold">{{ number_format($this->total, 2) }}</div>
                                        <div class="text-blue-100 text-sm">جنيه مصري</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-center pt-4">
                                <button type="submit"
                                    class="w-full max-w-md bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 hover:from-blue-600 hover:via-indigo-600 hover:to-purple-600 dark:hover:from-blue-700 dark:hover:via-indigo-700 dark:hover:to-purple-700 text-white py-4 px-8 rounded-xl transition-all duration-200 font-bold text-lg flex items-center justify-center shadow-xl hover:shadow-2xl transform hover:scale-[1.02]">
                                    <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    تسجيل العملية
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>