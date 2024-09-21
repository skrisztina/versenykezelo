@if (!$versenyek->isEmpty())
    <h2>Új forduló felvitele</h2>
    <form action="{{route('addFordulo')}}" method="POST" id="forduloAddForm">
        @csrf
        <label for="forduloVerseny">Verseny:</label>
        <select name="forduloAzon" id="forduloVerseny">
            @foreach ($versenyek as $verseny)
                <option value="{{$verseny->nev}}_{{$verseny->ev}}">{{$verseny->nev}} - {{$verseny->ev}}</option>
            @endforeach
        </select><br>
        <label for="forduloDatum">Dátum:</label>
        <input type="date" name="forduloDatum" id="forduloDatum" required><br>
        <label for="forduloNehezseg">Nehézség:</label>
        <select name="forduloNehezseg" id="forduloNehezseg">
            <option value="kezdő">Kezdő szint</option>
            <option value="közepes">Közepes szint</option>
            <option value="haladó">Haladó szint</option>
        </select><br><br>
        <button type="submit">Forduló felvitele</button>
    </form>
@endif