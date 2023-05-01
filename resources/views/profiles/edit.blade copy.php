<form method="POST" action="{{ route('profiles.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $profile->name }}" required autofocus>
    </div>

    <div>
        <label for="profile_image">Profile Image</label>
        <input id="profile_image" type="text" name="profile_image" value="{{ $profile->profile_image }}" required>
    </div>

    <div>
        <label for="summary">Summary</label>
        <textarea id="summary" name="summary" required>{{ $profile->summary }}</textarea>
    </div>

    <div>
        <label for="expertise">Expertise</label>
        <textarea id="expertise" name="expertise" required>{{ $profile->expertise }}</textarea>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ $profile->email }}" required>
    </div>

    <div>
        <label for="birthday">Birthday</label>
        <input id="birthday" type="date" name="birthday" value="{{ $profile->birthday }}" required>
    </div>

    <div>
        <label for="contact_number">Contact Number</label>
        <input id="contact_number" type="tel" name="contact_number" value="{{ $profile->contact_number }}">
    </div>

    <button type="submit">Save</button>
</form>
