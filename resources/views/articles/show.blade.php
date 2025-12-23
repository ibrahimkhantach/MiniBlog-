<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $article->title }} - MiniBlog</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease-out forwards;
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
        <header class="bg-dark-card/40 backdrop-blur-xl border-b border-white/5 sticky top-0 z-50 fade-in">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('articles.index') }}" 
                       class="inline-flex items-center gap-2 text-dark-muted hover:text-primary transition-colors duration-300 group">
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Back to Articles</span>
                    </a>
                    
                    <div class="flex items-center gap-2">
                        <a href="{{ route('articles.edit', $article) }}" 
                           class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 hover:bg-blue-500/10 text-dark-text hover:text-blue-400 text-sm font-medium rounded-lg transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span>Edit</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Article Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Article Header -->
            <article class="mb-12">
                <!-- ID Badge -->
                <div class="mb-6 slide-up opacity-0">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary/10 text-primary text-xs font-medium rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                        Article #{{ $article->id }}
                    </span>
                </div>
                
                <!-- Title -->
                <h1 class="text-5xl md:text-6xl font-heading font-bold bg-gradient-to-r from-dark-text via-purple-300 to-primary bg-clip-text text-transparent mb-8 leading-tight slide-up opacity-0 delay-1">
                    {{ $article->title }}
                </h1>
                
                <!-- Meta Info -->
                <div class="flex items-center gap-6 text-sm text-dark-muted mb-12 pb-8 border-b border-white/5 slide-up opacity-0 delay-2">
                    @if($article->created_at)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $article->created_at->format('M d, Y') }}</span>
                        </div>
                    @endif
                    
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span>{{ str_word_count($article->content) }} words · {{ ceil(str_word_count($article->content) / 200) }} min read</span>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="prose prose-lg prose-invert max-w-none slide-up opacity-0 delay-3">
                    <div class="bg-dark-card/60 backdrop-blur-sm rounded-2xl border border-white/5 p-8 md:p-12">
                        <p class="text-dark-text text-lg leading-relaxed whitespace-pre-wrap">{{ $article->content }}</p>
                    </div>
                </div>
            </article>
            
            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-8 border-t border-white/5">
                <a href="{{ route('articles.edit', $article) }}" 
                   class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-primary to-purple-600 text-white font-medium rounded-xl hover:from-primary-hover hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-primary/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Article</span>
                </a>
                
                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="flex-1"
                      onsubmit="return confirm('Are you sure you want to delete this article? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-white/5 hover:bg-red-500/10 text-dark-text hover:text-red-400 font-medium rounded-xl border border-white/5 hover:border-red-500/30 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <span>Delete Article</span>
                    </button>
                </form>
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