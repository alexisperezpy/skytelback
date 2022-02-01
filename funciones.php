obtenerVocales(){
$palabra = $request->nombre . $request->apellido;

$vocales = array_intersect(str_split($palabra), array('A','E','I','O','U','a','e','i','o','u'));

echo array_shift($vocales);

}

extraerVocales(){
    $palabra = $request->nombre . $request->apellido;
    $vocalesObtenidas = substr($palabra, array('A','E','I','O','U','a','e','i','o','u'));
    echo $vocalesObtenidas
}