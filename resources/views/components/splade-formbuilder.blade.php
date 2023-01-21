<x-splade-form
    method="{{ $for->method }}"
    action="{{ $for->action }}"
    :default="$for->data"
    @class($for->class ?? [])
>

    @foreach($for->fields as $field)
        {!! $field->render() !!}
    @endforeach

</x-splade-form>
