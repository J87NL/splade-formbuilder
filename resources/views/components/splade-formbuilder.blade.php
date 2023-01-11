<x-splade-form method="{{ $method ?? 'POST' }}" action="{{ $action }}" @class($class ?? [])>

    @foreach($fields as $field)
        {!! $field->render() !!}
    @endforeach

</x-splade-form>
