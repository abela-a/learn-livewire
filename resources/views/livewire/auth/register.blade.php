<form wire:submit.prevent="register">
    <div>
        <label for="name">
            Name
        </label>
        <input
          wire:model="name"
          type="text"
          id="name"
          name="name"
        >
    </div>
    <div>
        <label for="email">
            Email
        </label>
        <input
          wire:model="email"
          type="email"
          id="email"
          name="email"
        >
    </div>
    <div>
        <label for="password">
            Password
        </label>
        <input
          wire:model="password"
          type="password"
          id="password"
          name="password"
        >
    </div>
    <div>
        <label for="passwordConfirmation">
            Password Confirmation
        </label>
        <input
          wire:model="passwordConfirmation"
          type="password"
          id="passwordConfirmation"
          name="passwordConfirmation"
        >
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>