<table>
    <caption>Versenyzők</caption>
    <thead>
        <tr>
            <th>Név</th>
            <th>Email cím</th>
            <th>Születési idő</th>
            <th>Versenyzés kezdete</th>
            <th>Rang</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($versenyzok as $versenyzo)
        <tr>
            <td>{{$versenyzo->nev}}</td>
            <td>{{$versenyzo->email}}</td>
            <td>{{ date('Y-m-d', strtotime($versenyzo->szul_ido))}}</td>
            <td>{{ date('Y-m-d', strtotime($versenyzo->versenyzes_kezsete))}}</td>
            <td>{{$versenyzo->rang}}</td>
            <td>
                <form class="versenyzoDeleteForm" method="POST" action="{{ route('deleteVersenyzo')}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="email" value="{{$versenyzo->email}}">
                    <button class="versenyzoDeleteBtn" type="submit">Törlés</button>
                </form>
            </td>
        </tr> 
        @empty
            <tr>
                <td colspan="6">Még nincsenek versenyzők!</td>
            </tr>
        @endforelse
    </tbody>
</table>