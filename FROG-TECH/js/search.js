document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.querySelector('input[name="search"]');
            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.trim();

                if (searchTerm.length === 0) return;

                fetch('loja.php?search=' + encodeURIComponent(searchTerm))
                    .then(response => response.text())
                    .then(data => {
                        const produtosContainer = document.querySelector('.produtos-container');
                        produtosContainer.innerHTML = data;
                    })
                    .catch(error => console.error('Erro ao buscar:', error));
            });
        });