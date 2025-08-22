<div class="max-w-4xl mx-auto p-8">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-700 dark:to-purple-700 rounded-t-xl p-6 text-white">
        <div class="flex items-center justify-center space-x-3 space-x-reverse">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
            </svg>
            <h2 class="text-3xl font-bold">تسجيل حركة المخزون</h2>
        </div>
        <p class="text-center text-blue-100 dark:text-blue-200 mt-2">إدارة وتسجيل حركات دخول وخروج المخزون</p>
    </div>

    <!-- Main Content -->
    <div class="bg-white dark:bg-gray-800 rounded-b-xl shadow-2xl dark:shadow-gray-900/50 p-8">
        {{-- Flash Messages --}}
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border-r-4 border-green-400 dark:border-green-500 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-400 dark:text-green-500 ml-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    <span class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        
        @if (session()->has('error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border-r-4 border-red-400 dark:border-red-500 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-400 dark:text-red-500 ml-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                    </svg>
                    <span class="text-red-700 dark:text-red-300 font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    {{-- Category Selection --}}
                    <div class="relative">
                        <label for="selectedCategoryId" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 ml-2 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                            </svg>
                            فئة المنتج
                        </label>
                        <select wire:model.live="selectedCategoryId" id="selectedCategoryId" 
                                class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100">
                            <option value="">جميع الفئات</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Product Selection --}}
                    <div class="relative">
                        <label for="productId" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 ml-2 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM9 9a1 1 0 112 0v4a1 1 0 11-2 0V9z"/>
                            </svg>
                            المنتج
                            <span class="text-red-500 dark:text-red-400 mr-1">*</span>
                        </label>
                        <select wire:model="productId" id="productId" 
                                class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
                                {{ !$selectedCategoryId ? 'disabled' : '' }}>
                            <option value="">{{ $selectedCategoryId ? 'اختر المنتج' : 'اختر الفئة أولاً' }}</option>
                            @if($selectedCategoryId)
                                @foreach($this->filteredProducts as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }} 
                                        <span class="text-sm text-gray-500 dark:text-gray-400">(المخزون: {{ $product->quantity }} {{ $product->unit ?? 'قطعة' }})</span>
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('productId') 
                            <span class="text-red-500 dark:text-red-400 text-sm mt-2 block flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- Movement Type --}}
                    <div class="relative">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 ml-2 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"/>
                            </svg>
                            نوع الحركة
                            <span class="text-red-500 dark:text-red-400 mr-1">*</span>
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative">
                                <input type="radio" wire:model="type" value="in" class="sr-only peer">
                                <div class="p-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer transition duration-200 peer-checked:border-green-500 peer-checked:bg-green-50 dark:peer-checked:bg-green-900/20 hover:border-green-300 dark:hover:border-green-500 bg-white dark:bg-gray-700">
                                    <div class="flex items-center justify-center space-x-2 space-x-reverse">
                                        <svg class="w-6 h-6 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/>
                                        </svg>
                                        <span class="font-semibold text-green-600 dark:text-green-400">إدخال للمخزون</span>
                                    </div>
                                </div>
                            </label>
                            <label class="relative">
                                <input type="radio" wire:model="type" value="out" class="sr-only peer">
                                <div class="p-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer transition duration-200 peer-checked:border-red-500 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 hover:border-red-300 dark:hover:border-red-500 bg-white dark:bg-gray-700">
                                    <div class="flex items-center justify-center space-x-2 space-x-reverse">
                                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"/>
                                        </svg>
                                        <span class="font-semibold text-red-600 dark:text-red-400">إخراج من المخزون</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @error('type') 
                            <span class="text-red-500 dark:text-red-400 text-sm mt-2 block flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </span> 
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    {{-- Quantity --}}
                    <div class="relative">
                        <label for="quantity" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 ml-2 text-orange-500 dark:text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z"/>
                            </svg>
                            الكمية
                            <span class="text-red-500 dark:text-red-400 mr-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" wire:model="quantity" id="quantity" min="1" 
                                   class="w-full px-4 py-3 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600 text-lg font-medium text-gray-900 dark:text-gray-100" 
                                   placeholder="0">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <span class="text-gray-400 dark:text-gray-500 text-sm">قطعة</span>
                            </div>
                        </div>
                        @error('quantity') 
                            <span class="text-red-500 dark:text-red-400 text-sm mt-2 block flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- Note --}}
                    <div class="relative">
                        <label for="note" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 ml-2 text-indigo-500 dark:text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                            </svg>
                            ملاحظات
                            <span class="text-gray-400 dark:text-gray-500 text-xs mr-2">(اختياري)</span>
                        </label>
                        <textarea wire:model="note" id="note" rows="4" 
                                  class="w-full px-4 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent transition duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600 resize-none text-gray-900 dark:text-gray-100" 
                                  placeholder="أضف أي ملاحظات إضافية حول هذه الحركة..."></textarea>
                        @error('note') 
                            <span class="text-red-500 dark:text-red-400 text-sm mt-2 block flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                                </svg>
                                {{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-700 dark:to-purple-700 text-white font-bold rounded-xl hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-800 dark:hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transform transition duration-200 hover:scale-105 shadow-lg dark:shadow-gray-900/50">
                            <div class="flex items-center justify-center space-x-2 space-x-reverse">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                </svg>
                                <span>تسجيل الحركة</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
