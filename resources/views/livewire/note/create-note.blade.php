<div>

    <div class="mx-4">
        <h1 class="text-center">Create Note</h1>
        <input class="block mx-auto my-2 rounded" type="text" wire:model="title" placeholder="Titulo de Nota">
        <input class="block mx-auto my-2 rounded" type="text" wire:model="description" placeholder="Descripción">
        <div class="flex justify-center mb-2">
            <button class="bg-indigo-500 rounded p-2 mx-2" wire:click="add">Agregar</button>
            <button class="bg-indigo-500 rounded p-2 mx-2" wire:click="see">Test Notas</button>
        </div>

    </div>

    <ul class="bg-indigo-300 rounded p-2 m-2">
        @foreach ($todos as $todo)
            <li class="bg-indigo-100 rounded p-2 m-2">
                <span>Titulo: {{ $todo['title'] }}</span>
                <span>Description: {{ $todo['description'] }}</span>
                <form action="{{ route('notes.destroy') }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $todo->_id }}" />
                    <input type="submit" class="text-red-600" value="X" />

                </form>
            </li>
        @endforeach
    </ul>
</div>
