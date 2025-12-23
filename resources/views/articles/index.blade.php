<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Articles - MiniBlog</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
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
        <header class="bg-dark-card/40 backdrop-blur-xl border-b border-white/5 sticky top-0 z-50 fade-in-up">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <x-application-logo class="block h-10 w-auto" />
                        <p class="text-dark-muted mt-1 text-sm">Discover amazing articles</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary to-purple-600 text-white font-medium rounded-xl hover:from-primary-hover hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                            <span>Logout</span>
                        </button>
                    </form>

                  
                </div>
                 
            </div>
           
        </header>
        
        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
              <a href="{{ route('articles.create') }}" 
                       class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary to-purple-600 text-white font-medium rounded-xl hover:from-primary-hover hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Create Article</span>
                    </a>
            @if($articles->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-20 fade-in-up stagger-1">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-primary/10 mb-6">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-heading font-bold text-dark-text mb-3">No Articles Yet</h2>
                    <p class="text-dark-muted mb-8">Start by creating your first article!</p>
                    <a href="{{ route('articles.create') }}" 
                       class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary to-purple-600 text-white font-medium rounded-xl hover:from-primary-hover hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-primary/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Create Your First Article</span>
                    </a>
                </div>
            @else
                <!-- Articles Grid -->
                <div id="article-list" class="flex flex-col gap-6">
                    @foreach ($articles as $index => $article)
                        <article class="w-full group relative bg-dark-card/60 backdrop-blur-sm rounded-2xl border border-white/5 overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-1 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s; opacity: 0;">
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <!-- Content -->
                            <div class="relative p-6">
                                <!-- Article ID Badge -->
                                <div class="flex items-center justify-between mb-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-primary/10 text-primary text-xs font-medium rounded-full">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                        </svg>
                                        ID: {{ $article->id }}
                                    </span>
                                </div>
                                
                                <!-- Title -->
                                <h3 class="text-xl font-heading font-bold text-dark-text mb-3 line-clamp-2 group-hover:text-primary transition-colors duration-300">
                                    {{ $article->title }}
                                </h3>
                                
                                <!-- Content Preview -->
                                <p class="text-dark-muted text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ Str::limit($article->content, 120) }}
                                </p>
                                
                                <!-- Actions -->
                                <div class="flex items-center gap-2 border-t border-white/5 pt-4">
                                    <a href="{{ route('articles.show', $article) }}" 
                                       class="flex-1 text-center px-4 py-2.5 bg-white/5 hover:bg-primary/10 text-dark-text hover:text-primary text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-primary/10">
                                        <span class="flex items-center justify-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </span>
                                    </a>
                                    <a href="{{ route('articles.edit', $article) }}" 
                                       class="flex-1 text-center px-4 py-2.5 bg-white/5 hover:bg-blue-500/10 text-dark-text hover:text-blue-400 text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10">
                                        <span class="flex items-center justify-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </span>
                                    </a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="flex-1"
                                          onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-full px-4 py-2.5 bg-white/5 hover:bg-red-500/10 text-dark-text hover:text-red-400 text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-red-500/10">
                                            <span class="flex items-center justify-center gap-1.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <!-- Loading Indicator -->
                <div id="loading-text" class="text-center py-12 hidden">
                    <div class="inline-flex items-center gap-3 px-6 py-3 bg-primary/10 rounded-xl">
                        <svg class="animate-spin h-5 w-5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-dark-text font-medium">Loading more articles...</span>
                    </div>
                </div>
                
                <!-- Scroll Sentinel -->
                <div id="scroll-sentinel" class="h-1"></div>
            @endif
        </main>
        
        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-20 border-t border-white/5">
            <p class="text-center text-dark-muted text-sm">
                Built with ❤️ using Laravel & Tailwind CSS
            </p>
        </footer>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let nextPageUrl = "{{ $articles->nextPageUrl() }}";
        const sentinel = document.getElementById('scroll-sentinel');
        const list = document.getElementById('article-list');
        const loadingText = document.getElementById('loading-text');

        // We need the CSRF token for the delete forms in the new items
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && nextPageUrl) {
                loadMoreArticles();
            }
        }, {
            root: null,
            rootMargin: '200px', // Load before reaching bottom
            threshold: 0
        });

        if(sentinel) observer.observe(sentinel);

        function loadMoreArticles() {
            observer.unobserve(sentinel);
            loadingText.classList.remove('hidden'); // Show loader using Tailwind class

            fetch(nextPageUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                data.data.forEach(article => {
                    // Create the full card HTML structure to match Blade
                    const articleHtml = `
                    <article class="w-full group relative bg-dark-card/60 backdrop-blur-sm rounded-2xl border border-white/5 overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20 hover:-translate-y-1 fade-in-up">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-primary/10 text-primary text-xs font-medium rounded-full">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                    ID: ${article.id}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-heading font-bold text-dark-text mb-3 line-clamp-2 group-hover:text-primary transition-colors duration-300">
                                ${article.title}
                            </h3>
                            
                            <p class="text-dark-muted text-sm leading-relaxed mb-6 line-clamp-3">
                                ${article.content.length > 120 ? article.content.substring(0, 120) + '...' : article.content}
                            </p>
                            
                            <div class="flex items-center gap-2 border-t border-white/5 pt-4">
                                <a href="/articles/${article.id}" 
                                   class="flex-1 text-center px-4 py-2.5 bg-white/5 hover:bg-primary/10 text-dark-text hover:text-primary text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-primary/10">
                                    <span class="flex items-center justify-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        View
                                    </span>
                                </a>
                                <a href="/articles/${article.id}/edit" 
                                   class="flex-1 text-center px-4 py-2.5 bg-white/5 hover:bg-blue-500/10 text-dark-text hover:text-blue-400 text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10">
                                    <span class="flex items-center justify-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </span>
                                </a>
                                <form action="/articles/${article.id}" method="POST" class="flex-1"
                                      onsubmit="return confirm('Are you sure you want to delete this article?');">
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" 
                                            class="w-full px-4 py-2.5 bg-white/5 hover:bg-red-500/10 text-dark-text hover:text-red-400 text-sm font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-red-500/10">
                                        <span class="flex items-center justify-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                    `;
                    list.insertAdjacentHTML('beforeend', articleHtml);
                });

                nextPageUrl = data.next_page_url;
                loadingText.classList.add('hidden'); // Hide loader

                if (nextPageUrl) {
                    observer.observe(sentinel);
                } else {
                    sentinel.remove(); // Remove sentinel if no more pages
                }
            })
            .catch(err => {
                console.error('Error loading articles:', err);
                loadingText.classList.add('hidden');
            });
        }
    });
</script>
</body>
</html>