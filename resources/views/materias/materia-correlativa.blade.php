
@foreach ($correlativas as $correlativa)   
    <tr>
        <th scope="row">{{$correlativa->requerida}}</th>
        <td>{{$correlativa->requerida_nombre}}</td>
        <td>{{$correlativa->condicion}}</td>
    </tr>
@endforeach