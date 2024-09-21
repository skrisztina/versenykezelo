@if (!$fordulok->isEmpty())
    <h2>Versenyző regisztrálása fordulóra</h2>
    <form action="{{route ('addVersenyzoToFordulo')}}" method="GET" id="versenyzoToForduloForm">
        @csrf
        <label for="forduloSelect">Forduló:</label>
        <select name="forduloSelect" id="forduloSelect">
            @foreach ($fordulok as $fordulo)
                <option value="{{$fordulo->verseny_nev}}_{{$fordulo->verseny_ev}}_{{$fordulo->datum}}">{{$fordulo->verseny_nev}}-{{$fordulo->verseny_ev}} : {{ date('Y-m-d', strtotime($fordulo->datum))}}</option>
            @endforeach
        </select><br>
        <label for="versenyzoSelect">Versenyző:</label>
        <select name="versenyzo" id="versenyzoSelect">
            @foreach ($versenyzok as $versenyzo)
                <option value="{{$versenyzo->email}}">{{$versenyzo->nev}} - {{$versenyzo->email}}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Versenyző regisztrálása</button>
    </form>
@endif