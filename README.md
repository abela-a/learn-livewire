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