<div>
    <div class="m-4 bg-indigo-100 rounded">
        <h1 class="text-center text-gray-500">Create Note</h1>
        <input class="block mx-auto my-2 rounded-lg border-none shadow text-gray-500" type="text" wire:model="title"
            placeholder="Titulo de Nota">
        <input class="block mx-auto my-2 rounded-lg border-none shadow text-gray-500" type="text"
            wire:model="description" placeholder="Descripción">

        @foreach ($fields as $index => $field)
            <div wire:ignore>
                <div wire:key="dynamic-field-{{ $index }}" class="mb-4" v-for="(field, index) in fields">
                    <input type="text" class="form-control rounded-lg border-none shadow  text-gray-500"
                        placeholder="Nombre del campo" wire:model="fields.{{ $index }}.name">
                    <input type="text" class="form-control rounded-lg border-none shadow  text-gray-500"
                        placeholder="Contenido del campo" wire:model="fields.{{ $index }}.value">
                    <button wire:click="removeField({{ $index }})"
                        class="btn btn-danger mt-2 bg-red-500 p-2 rounded text-white border-none shadow">Eliminar</button>
                </div>
            </div>
        @endforeach

        <div class="flex justify-center p-2">
            <button class="bg-indigo-500 rounded p-2 mx-2 text-white" wire:click="new">Nuevo Campo</button>
            <button class="bg-indigo-500 rounded p-2 mx-2 text-white" wire:click="add">Agregar</button>
            <button class="bg-indigo-500 rounded p-2 mx-2 text-white" wire:click="see">Test Notas</button>
            <button class="bg-indigo-500 rounded p-2 mx-2 text-white" wire:click="test">Test</button>
        </div>

    </div>
    <ul class="bg-indigo-300 rounded p-2 m-2">
        @foreach ($notes as $note)
            <li class="bg-indigo-100 rounded p-2 m-2">
                <p class="text-gray-500">{{ $note->id }}</p>
                <span class="text-gray-500">Titulo: {{ $note['title'] }}</span>
                <span class="text-gray-500">Description: {{ $note['description'] }}</span>
                <form action="{{ route('notes.destroy') }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $note->id }}" />
                    <input type="submit" class="text-red-600" value="X" />
                </form>
                @foreach ($notefields as $notefield)
                    <span class="text-gray-500">{{ $notefield->name }} :</span>
                    <span class="text-gray-500">{{ $notefield->value }}</span>
                    <br />
                @endforeach
            </li>
        @endforeach
    </ul>
</div>
