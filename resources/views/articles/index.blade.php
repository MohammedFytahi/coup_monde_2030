<x-app :title="'Articles'">

    <section id="search-results" class="players">
        @foreach ($articles as $article)
        <article class="player hover:bg-black hover:text-white rounded-lg transition-all top-0 hover:scale-110" >
            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}">
            <div class="player-info">
                <h3>{{ $article->title }}</h3>
                <p class="break-words">{{ $article->content }}</p>
                <div class="flex items-center">
                    <a class="link-button" href="#">Read More <i class="fas fa-angle-double-right"></i></a>
                    @if (auth()->user() && auth()->user()->role == 'admin')
                    <div class="ml-auto text-right">
                        <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;">
                            <i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete
                        </a>
                        <a onclick="openEditModal('{{ $article->id }}', '{{ $article->title }}', '{{ $article->content }}')" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;">
                            <i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit
                        </a>
                    </div>
                    @endif
                    @if(auth()->user() && auth()->user()->role == 'utilisateur')
                    <!-- Bouton "Like" -->
                    <button class="like-button ml-20" data-article-id="{{ $article->id }}" data-likes="{{ $article->likes }}">
                        <i class="far fa-thumbs-up"></i> <span class="likes-count">{{ $article->likes }}</span>
                    </button>
                    
                    <button class="dislike-button" data-article-id="{{ $article->id }}" data-dislikes="{{ $article->dislikes }}">
                        <i class="far fa-thumbs-down"></i> <span class="dislikes-count">{{ $article->dislikes }}</span>
                    </button>
                    
                    <!-- Bouton "Commentaire" -->
                    <button class="text-gray-500 focus:outline-none text-lg">
                        <i class="far fa-comment"></i>
                    </button>
                    @endif
                </div>
            </div>
        </article>
        @endforeach
    </section>
    {{-- <div id="search-results">
        <!-- Les résultats de recherche seront affichés ici -->
    </div> --}}
    <div id="editArticleModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <!-- Contenu du formulaire de modification -->
    </div>
    
    

    <script>

        const likeButtons = document.querySelectorAll('.like-button');


        likeButtons.forEach(button => {
            button.addEventListener('input', function () {
                const articleId = button.dataset.articleId;
                const isLiked = button.classList.contains('liked');

                fetch(`/articles/${articleId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ liked: !isLiked })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Likes updated successfully') {
                        button.classList.toggle('liked'); // Ajouter ou supprimer la classe 'liked'
                        const likesCount = button.querySelector('.likes-count');
                        const newLikes = isLiked ? parseInt(likesCount.textContent) - 1 : parseInt(likesCount.textContent) + 1;
                        likesCount.textContent = newLikes;
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la mise à jour des likes :', error);
                });
            });
        });

        const dislikeButtons = document.querySelectorAll('.dislike-button');

dislikeButtons.forEach(button => {
    button.addEventListener('click', function () {
        const articleId = button.dataset.articleId;
        const isDisliked = button.classList.contains('disliked');

        fetch(`/articles/${articleId}/dislike`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ disliked: !isDisliked })
        })
        .then(response => response.json())
        .then(data => {
            // Mettre à jour l'affichage ou gérer d'autres actions nécessaires
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour des dislikes :', error);
        });
    });
});

const searchForm = document.getElementById('search-form');
const searchResults = document.getElementById('search-results');
searchForm.addEventListener('input', function(event) {
    const query = event.target.value;

    fetch(`/articles/search?query=${query}`)
        .then(response => response.json())
        .then(data => {
            // Effacer les résultats de recherche précédents
            searchResults.innerHTML = '';

            // Afficher les nouveaux résultats de recherche
            data.articles.forEach(article => {
    const articleDiv = document.createElement('article');
    articleDiv.classList.add('player');

    // Utilisation de la même structure HTML que celle des articles
    articleDiv.innerHTML = `
        <img src="${article.image}" alt="${article.title}">
        <div class="player-info">
            <h3>${article.title}</h3>
            <p class="break-words">${article.content}</p>
            <div class="flex items-center">
                <a class="link-button" href="#">Read More <i class="fas fa-angle-double-right"></i></a>
                ${article.isAdmin ? `
                    <div class="ml-auto text-right">
                        <a onclick="openEditModal('${article.id}', '${article.title}', '${article.content}')" class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;">
                            <i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete
                        </a>
                        <a onclick="openEditModal('${article.id}', '${article.title}', '${article.content}')" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;">
                            <i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit
                        </a>
                    </div>
                ` : ''}
                ${article.isUser ? `
                    <button class="like-button ml-20" data-article-id="" data-likes="">
                    <i class="far fa-thumbs-up"></i> <span class="likes-count"></span>
                </button>
                
                <button class="dislike-button" data-article-id="${article.id}" data-dislikes="${article.dislikes}">
                    <i class="far fa-thumbs-down"></i> <span class="dislikes-count"></span>
                </button>
                
                <button class="text-gray-500 focus:outline-none text-lg">
                    <i class="far fa-comment"></i>
                </button>
                ` : ''}
                
            </div>
        </div>
    `;

    searchResults.appendChild(articleDiv);
});

        })
        .catch(error => {
            console.error('Erreur lors de la recherche :', error);
        });
});


function openEditModal(id, title, content) {
        // Remplir les champs du formulaire avec les détails de l'article sélectionné
        document.getElementById('editArticleModal').innerHTML = `
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Modifier l'article</p>
                        <button onclick="closeEditModal()" class="text-black opacity-50 hover:text-black focus:outline-none">
                            <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.78 21.78l-1.56 1.56L12 13.56l-6.22 6.22-1.56-1.56L10.44 12 4.22 5.78l1.56-1.56L12 10.44l6.22-6.22 1.56 1.56L13.56 12l6.22 6.22z" />
                            </svg>
                        </button>
                    </div>
                    <form id="editForm" action="/articles/${id}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Titre:</label>
                            <input type="text" id="title" name="title" value="${title}" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Contenu:</label>
                            <textarea id="content" name="content" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">${content}</textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Modifier</button>
                    </form>
                </div>
            </div>
        `;
        // Afficher le formulaire de modification
        document.getElementById('editArticleModal').classList.remove('hidden');
    }

    // Fonction pour fermer le formulaire de modification
    function closeEditModal() {
        // Cacher le formulaire de modification
        document.getElementById('editArticleModal').classList.add('hidden');
    }
    </script>
</x-app>
