# Learn Laravel Livewire

## Lesson 2

### wire:model.debounce.1--ms

untuk memberi delay ketika ngetik di inputan.

### wire:model.lazy

untuk menunggu user menghilangkan fokus pada inputan kemudian mengirim request.

### select multiple

jika menambah attribut multiple pada select akan membuat value dari inputan menjadi array.

```php
// single
public $greeting = 'Hello';

// multiple
public $greeting = ['Hello', 'Adios'];
```

## Lesson 3

### wire:click

menambah event click pada DOM.

```html
<button wire:click="resetName">
  Reset Name
</button>

<!-- Passing param -->
<button wire:click="resetName('Abela')">
  Reset Name
</button>
```

```php
public function resetName()
{
    $this->name = '';
}

// Passing param
public function resetName($name = '')
{
    $this->name = $name;
}
```

saat memanggil method pada `wire:click` kita dapat menambahkan `$event` untuk mendapatkan event yang sedang terjadi.

```html
<button
  wire:click="resetName($event.target.innerText)"
>
  Reset Name
</button>

<!-- output : Reset Name -->
```

### wire:submit.prevent

mengirim form request dan menghilangkan aksi awalnya.