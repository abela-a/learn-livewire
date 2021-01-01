<div>
    <select wire:model="greeting">
        <option>Hello</option>
        <option>Assalamu'alaikum</option>
        <option>Adios</option>
    </select>
    <input
      type="text"
      wire:model="name"
    >
    <input
      type="checkbox"
      wire:model="loud"
    >

    <h2>
        {{ $greeting }} {{ $name }} @if($loud) ! @endif
    </h2>

    <button wire:click="resetName">Reset Name</button>
</div>
