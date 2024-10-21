<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <h1 class="text-center my-4">Update</h1>

        <form action="{{ route('guidetours.update', $assignment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tours" class="form-label">Select Trip</label>
                <select name="tours" id="tours" class="form-select" required>
                    <option value="{{ $assignment->id }}">{{ $assignment->title }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="guides" class="form-label">Select Guides</label>
                <select name="guides[]" id="guides" class="form-select" multiple required>
                    @foreach ($guides as $guide)
                        <option value="{{ $guide->id }}" {{ $assignment->guides->contains($guide->id) ? 'selected' : '' }}>
                            {{ $guide->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('guidetours.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
