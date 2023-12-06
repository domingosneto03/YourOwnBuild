/*document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.querySelector('input[type="text"]');

    searchInput.addEventListener('keyup', function() {
        var query = this.value;

        if (query.length < 2) {
            document.getElementById('livesearch').innerHTML = '';
            return;
        }

        fetch('/search?query=' + encodeURIComponent(query), { // encodeURIComponent to ensure query is URL-safe
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json()) // Parse response as JSON
        .then(data => {
            document.getElementById('livesearch').innerHTML = data.html; // Use the 'html' key from the response
        })
        .catch(error => console.error('Error:', error));
    });
});
*/