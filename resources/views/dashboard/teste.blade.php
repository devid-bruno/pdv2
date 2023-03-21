<form action="{{route('add.teste')}}" method="post">
    @csrf
<input type="text" name="nome_produto">
<button type="submit">enviar</button>
</form>
