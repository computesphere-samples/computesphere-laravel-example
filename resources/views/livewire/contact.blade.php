<div class="contact-container">
    <h3>
        Contact Manager Example
    </h3>
    <p class="description text">This tool allows you to manage contacts using the form below.</p>

    <form wire:submit.prevent="save">
        <div class="form-inputs">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" wire:model="name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit">Add Contact</button>
    </form>

    @if (count($contacts))
        <table class="contacts">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact['name'] }}</td>
                    <td>{{ $contact['email'] }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</div>
