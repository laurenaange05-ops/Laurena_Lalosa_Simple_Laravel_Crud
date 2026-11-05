<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visitor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Visitor</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $visitor->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control"
                           value="{{ old('address', $visitor->address) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <select name="position" class="form-select" required>
                        <option value="">Select Position</option>

                        @foreach (['Student', 'Teacher', 'Employee', 'Visitor', 'Staff'] as $position)
                            <option value="{{ $position }}"
                                @selected(old('position', $visitor->position) === $position)>
                                {{ $position }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Visitor
                </button>

                <a href="{{ route('visitors.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
