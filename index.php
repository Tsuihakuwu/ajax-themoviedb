<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API TheMovieDB</title>
    <style>
        form {
            width: 50%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        fieldset {
            padding: 1rem;
        }

        .list_film {
            width: 50%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <form action="">
        <fieldset>
            <legend><b>API TheMovieDB</b></legend>
            <input type="text" name="film" id="film" placeholder="Nom de votre film" value="Avengers">
            <input type="button" id="find" value="Rechercher">
        </fieldset>
    </form>

    <div id="display_query_result">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            const key = 'f33cd318f5135dba306176c13104506a';

            //Event listener sur click bouton rechercher
            $("#find").on("click", function() {
                var film = $('#film').val();

                $("#display_query_result").empty();

                $.getJSON('http://api.themoviedb.org/3/search/movie?api_key=' + key + '&query=' + film, function(response) {

                    console.log(response);
                    i = 0;
                    //Listage de toutes les régions dans une boucle
                    response['results'].forEach(element => {
                        if (response.results[i].backdrop_path != null) {
                            //Affichage des éléments retournés
                            $('#display_query_result').append('<div class="list_film" id=film' + i + ' >');
                            //Image
                            $('#display_query_result')
                                .append('<img src="http://image.tmdb.org/t/p/w185' + response.results[i].poster_path + '" alt="">');
                            //Titre
                            $('#display_query_result')
                                .append('<br><span>Titre :</span><b>' + response.results[i].title + '</b>');
                            //Titre Original
                            $('#display_query_result')
                                .append('<br><span>Titre Original : </span><span>' + response.results[i].original_title + '</span>');

                            $('#display_query_result').append('<hr><br>');
                            ++i;
                        }
                    });

                });

            });
        });
    </script>

</body>

</html>