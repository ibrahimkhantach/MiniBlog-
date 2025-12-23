<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Article - MiniBlog</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
    </style>
</head>
<body class="bg-gradient-to-br from-dark-bg via-slate-900 to-dark-card min-h-screen font-sans antialiased">
    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgb(147, 51, 234) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <!-- Main Container -->
    <div class="relative min-h-screen">
        <!-- Header -->
        <header class="bg-dark-card/40 backdrop-blur-xl border-b border-white/5 sticky top-0 z-50 slide-up opacity-0">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('articles.show', $article) }}" 
                       class="inline-flex items-center gap-2 text-dark-muted hover:text-primary transition-colors duration-300 group">
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Back to Article</span>
                    </a>
                    
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-500/10 text-blue-400 text-xs font-medium rounded-full">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Editing Mode
                        </span>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Page Title -->
            <div class="mb-12 slide-up opacity-0 delay-1">
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary/10 text-primary text-xs font-medium rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                        Article #{{ $article->id }}
                    </span>
                </div>
                <h1 class="text-5xl md:text-6xl font-heading font-bold bg-gradient-to-r from-dark-text via-blue-300 to-blue-500 bg-clip-text text-transparent mb-4 leading-tight">
                    Edit Article
                </h1>
                <p class="text-dark-muted text-lg">Update your article content</p>
            </div>
            
            <!-- Form Container -->
            <div class="bg-dark-card/60 backdrop-blur-sm rounded-2xl border border-white/5 p-8 md:p-12 slide-up opacity-0 delay-2">
                <form action="{{ route('articles.update', $article) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <!-- Title Input -->
                    <div class="group">
                        <label for="title" class="block text-sm font-medium text-dark-text mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            <span>Article Title</span>
                        </label>
                        <input 
                            type="text" 
                            id="title"
                            name="title" 
                            required
                            value="{{ old('title', $article->title) }}"
                            placeholder="Enter a captivating title..." 
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-xl text-dark-text placeholder-dark-muted focus:border-primary focus:ring-2 focus:ring-primary/20 focus:bg-white/10 transition-all duration-300 outline-none text-lg"
                        >
                        @error('title')
                            <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Content Input -->
                    <div class="group">
                        <label for="content" class="block text-sm font-medium text-dark-text mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Content</span>
                        </label>
                        <textarea 
                            id="content"
                            name="content" 
                            required
                            rows="12"
                            placeholder="Write your article content here..." 
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-xl text-dark-text placeholder-dark-muted focus:border-primary focus:ring-2 focus:ring-primary/20 focus:bg-white/10 transition-all duration-300 outline-none resize-none text-lg leading-relaxed"
                        >{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-400 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4 pt-6 border-t border-white/5">
                        <button 
                            type="submit"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/50 group"
                        >
                            <svg class="w-5 h-5 transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Update Article</span>
                        </button>
                        
                        <a 
                            href="{{ route('articles.show', $article) }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/5 hover:bg-white/10 text-dark-text border border-white/10 hover:border-white/20 font-medium rounded-xl transition-all duration-300 transform hover:scale-105"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Cancel</span>
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Info Section -->
            <div class="mt-8 slide-up opacity-0 delay-3">
                <div class="bg-blue-500/5 border border-blue-500/10 rounded-xl p-6">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-dark-text font-semibold mb-2">Article Information</h3>
                            <div class="text-dark-muted text-sm space-y-2">
                                @if($article->created_at)
                                    <p class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Created: {{ $article->created_at->format('M d, Y \a\t h:i A') }}</span>
                                    </p>
                                @endif
                                @if($article->updated_at && $article->updated_at != $article->created_at)
                                    <p class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        <span>Last updated: {{ $article->updated_at->format('M d, Y \a\t h:i A') }}</span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-20 border-t border-white/5">
            <p class="text-center text-dark-muted text-sm">
                Built with ❤️ using Laravel & Tailwind CSS
            </p>
        </footer>
    </div>
</body>
</html>