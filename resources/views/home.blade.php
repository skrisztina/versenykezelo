<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build\assets\app-BawOEPvA.css') }}">
    <title>Versenykezelő</title>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>

        function loadVersenyTable(){
            $('#versenyTable').load("{{ route('getVersenyek')}}")
        }

        function loadVersenyzoTable(){
            $('#versenyzoTable').load("{{ route('getVersenyzok')}}")
        }

        function loadForduloForm(){
            $('#forduloAdd').load("{{ route('getForduloForm')}}")
        }

        function loadForduloTable(){
            $('#forduloTable').load("{{route('loadForduloTable')}}")
        }

        function loadVersenyzoToFordulo(){
            $('#versenyezAddForm').load("{{route('getVersenyezForm')}}")
        }

        $(document).ready(function(){
            loadVersenyTable();
            loadVersenyzoTable();
            loadForduloForm();
            loadForduloTable();
            loadVersenyzoToFordulo();

            $('#versenyAddForm').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url:$(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#versenyAddMsg').css({"color":"#03c42c"}).html(response.success).show();
                        loadVersenyTable();
                        loadForduloForm();
                        loadForduloTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        $('#versenyAddMsg').css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                });
            });

            $('#versenyzoAddForm').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url:$(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#versenyzoAddMsg').css({"color":"#03c42c"}).html(response.success).show();
                        loadVersenyzoTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        $('versenyzoAddMsg').css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                });
            });

            $(document).on('submit', '.versenyDeleteForm', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'DELETE',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#versenyAddMsg').css({"color":"#03c42c"}).html(response.success).show();
                        loadVersenyTable();
                        loadVersenyzoTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        $('#versenyAddMsg').css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                    
                });
            });

            $(document).on('submit', '.versenyzoDeleteForm', function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'DELETE',
                    data: $(this).serialize(),
                    success: function(response){
                        $("#versenyzoAddMsg").css({"color":"#03c42c"}).html(response.success).show();
                        loadVersenyzoTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        $("#versenyzoAddMsg").css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                })
            });

            $(document).on('submit', '#forduloAddForm', function(e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#forduloAddMsg').css({"color":"#03c42c"}).html(response.success).show();
                        loadForduloTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        $('#forduloAddMsg').css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                })
            });

            $(document).on('submit', '#versenyzoToForduloForm', function(e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action'),
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#versenyezAddMsg').css({"color":"#03c42c"}).html(response.success).show();
                        loadForduloTable();
                        loadVersenyzoToFordulo();
                    },
                    error: function(response){
                        console.log(response);
                        $('#versenyezAddMsg').css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                })
            });

            $(document).on('click', '.forduloDelete', function(e){
                e.preventDefault();
                let data = $(this).val().split('_');
                $.ajax({
                    url: '/deleteFordulo',
                    type: 'DELETE',
                    data: {
                        verseny_nev: data[0],
                        verseny_ev: data[1],
                        datum: data[2],
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response){
                        $("#forduloAddMsg").css({"color":"#03c42c"}).html(response.success).show();
                        loadForduloTable();
                    },
                    error: function(response){
                        $("#forduloAddMsg").css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                })
            });

            $(document).on('click', '.versenyezDelete', function(e){
                e.preventDefault();
                let data = $(this).val().split('_');
                $.ajax({
                    url: '/deleteVersenyez',
                    type: 'DELETE',
                    data: {
                        verseny_nev: data[0],
                        verseny_ev: data[1],
                        fordulo_datum: data[2],
                        versenyzo_email: data[3],
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response){
                        $("#forduloAddMsg").css({"color":"#03c42c"}).html(response.success).show();
                        loadForduloTable();
                    },
                    error: function(response){
                        $("#forduloAddMsg").css({"color": "#e50012"}).html(response.responseJSON.error).show();
                    }
                })
            });
        });
    </script>
</head>
<body>
    <h1 class="cim">Versenykezelő</h1>

    <div id="versenyTable"></div>
    <p class="message" id="versenyAddMsg"></p>

    <div id="versenyAdd" class="formDiv">
        <h2>Új verseny felvitele</h2>
        <form action="{{ route ('addVerseny')}}" method="POST" id="versenyAddForm">
            @csrf
            <label for="versenyNev">Név:</label>
            <input type="text" name="versenyNev" id="versenyNev" required><br><br>
            <label for="versenyEv">Év:</label>
            <input type="text" name="versenyEv" id="versenyEv" maxlength="4" required><br><br>
            <label for="versenyHely">Helyszín:</label>
            <input type="text" name="versenyHely" id="versenyHely" required><br><br>
            <label for="versenyNyelv">Elérhető nyelvek:</label>
            <input type="text" name="versenyNyelv" id="versenyNyelv" required><br><br>
            <button type="submit">Verseny hozzáadása</button>
        </form>
    </div>

    <div id="forduloTable"></div>
    <p class="message" id="forduloAddMsg"></p>

    <div class="formDiv" id="forduloAdd"></div>

    <div class="formDiv" id="versenyezAddForm"></div>
    <p class="message" id="versenyezAddMsg"></p>

    <div id="versenyzoTable"></div>
    <p class="message" id="versenyzoAddMsg"></p>

    <div class="formDiv" id="versenyzoAdd">
        <h2>Új versenyző felvitele</h2>
        <form action="{{ route('addVersenyzo')}}" method="POST" id="versenyzoAddForm">
            @csrf
            <label for="versenyzoNev">Név:</label>
            <input type="text" name="versenyzoNev" id="versenyzoNev" required><br><br>
            <label for="versenyzoEmail">Eamil cím:</label>
            <input type="email" name="versenyzoEmail" id="versenyzoEmail" required><br><br>
            <label for="versenyzoSzul">Születési idő:</label>
            <input type="date" name="versenyzoSzul" id="versenyzoSzul" required><br><br>
            <label for="versenyzoKezd">Versenyzés kezdete:</label>
            <input type="date" name="versenyzoKezd" id="versenyzoKezd" required><br><br>
            <label for="versenyzoRang">Rang:</label>
            <select id="versenyzoRang" name="versenyzoRang">
                <option value="1">1: Kezdő</option>
                <option value="2">2: Közepes</option>
                <option value="3">3: Középhaladó</option>
                <option value="4">4: Haladó</option>
                <option value="5">5: Bajnok</option>
            </select><br><br>
            <button type="submit">Versenyző felvitele</button>
        </form>
    </div>

</body>
</html>