<h1>SIGEPER: Nuevo comentario</h1>

<p>Hola tienes un nuevo comentario en el documento {{ $comentario->documento->nombre }}</p>
<p>Nombre: {{$comentario->usuario->nombre . " " . $comentario->usuario->apellidos}}</p>
<p>Comentario: {{$comentario->comentario}}</p>
<p>Fecha: {{$comentario->created_at}}</p>
<p>Para ver el comentario haz click <a href="{{route('comentariosDocumento', $comentario->documento->id)}}">aquí</a></p>
