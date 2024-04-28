<x-app>
    <form id="commentForm">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <textarea name="content" rows="3"></textarea>
        <button type="submit">Ajouter un commentaire</button>
    </form>
    <div id="comments">
  
    </div>

    <script>
        document.getElementById('commentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('/comments', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
   
        if (data.success) {

            const commentsDiv = document.getElementById('comments');
            const newCommentDiv = document.createElement('div');
            newCommentDiv.textContent = formData.get('content'); 
            commentsDiv.appendChild(newCommentDiv);
            

            document.querySelector('#commentForm textarea').value = '';
        } else {
            console.error('Erreur lors de l\'ajout du commentaire :', data.errors);
        }
    })
    .catch(error => {
        console.error('Erreur lors de l\'ajout du commentaire :', error);
    });
});

    </script>
</x-app>    