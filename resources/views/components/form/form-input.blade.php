@props([
    "model",
    "method",
    "action",
    "name"
    ])

<form action="{{ route("dashboard.$name.$action", $model) }}" method="POST" class="hidden"
      id="form-{{$action}}-{{$model->id}}">
    @csrf
    @method($method)
</form>
