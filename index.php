<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./public_html/css/bootstrap.css">
        <link rel="stylesheet" href="/public_html/css/style.css">
</head>
<body>
    <?php
        require('./connexion/connexiondb.php');
        require('./class/classiles.php');

        $select_iles = new iles ();
        $iles_villes = $select_iles->showIles();

        echo '<center>';
            echo '<h2>';
                echo 'Choisie ton iles';
            echo '</h2>';
            echo '<select id="select_iles">';

                foreach ($iles_villes as $value) {
                    
                    echo '<option value="'.$value["name"].'">';
                        echo $value["name"];    
                    echo '</option>';
                }

            echo '</select>';

            echo '<div id="bloc_show_ville">';
            echo '</div>';
        echo'</center>';

        ?>

        <script src="./jquery/jquerry.js"></script>
        <script language="javascript">

            $(document).ready(function(){
                // je récupère mes valeur
                $('#select_iles').click(function(){
                    select_ile = $('#select_iles').val();
                    getVille(select_ile);
                })
            });

            function getVille(select_ile){
                $.ajax({
                    type: "post",
                    url: "./function/function.php",
                    data: {
                        'ile': select_ile
                    },
                    dataType: 'json',
                    success: function(data) {
                        
                        $('#bloc_show_ville').empty();
                        $('#bloc_show_ville').append('<h2> Choisie ta ville </h2> <select id="show_ville"></select>');
                        $.each(data.data,function(idx,el){
                            $('#show_ville').append('<option >'+el+'</option>');

                        })
                    },
                    error: function(){
                        alert('error');
                    }
                })
            };
    </script>
        <!-- <script src="./jquery.js"></script> 
            <script language="javascript">

            $(document).ready(function(){

                $('#select_iles').on('change',function(){
                    $select_ile = $('#select_iles').val();
                    getVilles($select_ile);
                    
                });  
            });

            function getVilles($select_ile){
                    $.ajax({
                        type: "post",
                        url: "function.php",
                        data: {
                            'ile': $select_ile
                        },
                        dataType: 'json',
                        success: function($data) {
                            alert('success');
                        }

                });
            }

        </script> -->
</body>
</html>