$(function () {
    function onSearch() {
        //récuperer la chaine de recherche 
        let searchClients = $('#Search').val()
        
        //envoyer la chaine de recherche vers le serveur 
        $.get(
            'SearchClient.php',
            { Search: searchClients },
            onSearchClient
        );
    }
    //recuperer le resultat du serveur 
    function onSearchClient(clientList) {
        $('#tab').html(clientList)
    }


    $("#Search").on("input", onSearch);
    
})
