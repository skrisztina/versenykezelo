@if ($versenyNum > 0)
    <table>
        <caption>Fordulók</caption>
        <thead>
            <tr>
                <th>Verseny név:</th>
                <th>Verseny év:</th>
                <th>Dátum:</th>
                <th>Nehézség:</th>
                <th>Versenyzők:</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fordulok as $fordulo)
                <tr>
                    <td>{{$fordulo->verseny_nev}}</td>
                    <td>{{$fordulo->verseny_ev}}</td>
                    <td>{{ date('Y-m-d', strtotime($fordulo->datum))}}</td>
                    <td>{{$fordulo->nehezseg}}</td>
                    <td>
                        <ul>
                            @php
                                $vanVersenyzo = false;
                            @endphp

                            @foreach ($versenyezek as $versenyez)
                                @if (\Carbon\Carbon::parse($versenyez->fordulo_datum)->eq(\Carbon\Carbon::parse($fordulo->datum)) && $versenyez->verseny_nev == $fordulo->verseny_nev && $versenyez->verseny_ev == $fordulo->verseny_ev)
                                    @foreach ($versenyzok as $versenyzo)
                                        @php
                                            $vanVersenyzo = true;
                                        @endphp
                                        @if ($versenyzo->email == $versenyez->versenyzo_email)
                                        <li>{{$versenyzo->nev}}
                                            <button class="versenyezDelete" value="{{$versenyez->verseny_nev}}_{{$versenyez->verseny_ev}}_{{$versenyez->fordulo_datum}}_{{$versenyzo->email}}">Leiratás</button>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            @if (!$vanVersenyzo)
                                <li>Még nincs versenyző rendelve a fordulóhoz.</li>
                            @endif
                        </ul>
                    </td>
                    <td>
                        <button class="forduloDelete" value="{{$fordulo->verseny_nev}}_{{$fordulo->verseny_ev}}_{{$fordulo->datum}}">Forduló Törlése</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Még nincsenek fordulók!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endif