<table>
    <caption>Versenyek</caption>
    <thead>
        <tr>
            <th>Verseny neve</th>
            <th>Év</th>
            <th>Helyszín</th>
            <th>Nyelvek</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($versenyek as $verseny)
            <tr>
                <td>{{$verseny->nev}}</td>
                <td>{{$verseny->ev}}</td>
                <td>{{$verseny->helyszin}}</td>
                <td>{{$verseny->nyelvek}}</td>
                <td>
                    <form class="versenyDeleteForm" method="POST" action="{{ route ('deleteVerseny')}}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="nev" value="{{$verseny->nev}}">
                        <input type="hidden" name="ev" value="{{$verseny->ev}}">
                        <button class="versenyDeleteBtn" type="submit">Törlés</button>
                    </form>
                </td>
            </tr>    
        @empty
            <tr>
                <td colspan="5">Még nincsenek versenyek!</td>
            </tr>
        @endforelse
    </tbody>
</table>
