// LÓGICA PARA REALIZAR PESQUISA POR NOME 

var search = document.getElementById('pesquisar')
search.addEventListener("keydown", (event) => {
    if (event.key == "Enter") {
        pesquisardados()
    }
})

function pesquisardados() {
    window.location = 'consultar_artista_amais.php?search=' + search.value
}