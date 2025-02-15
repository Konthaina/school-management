<x-app-layout>
    <style>
        /* Reusing styles from create.blade.php */
        .input-label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #000;
            color: #fff;
            border: 1px solid #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .submit-button:hover {
            opacity: 0.9;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-6">Edit Document</h2>

                    <form action="{{ route('lecturer.documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label for="name" class="input-label">Document Name</label>
                        <input type="text" id="name" name="name" class="input-field" value="{{ $document->name }}" required>

                        <label for="publication_year" class="input-label">Publication Year</label>
                        <input type="number" id="publication_year" name="publication_year" class="input-field" value="{{ $document->publication_year }}" required>

                        <label for="keywords" class="input-label">Keywords</label>
                        <input type="text" id="keywords" name="keywords" class="input-field" value="{{ $document->keywords }}">

                        <label for="file" class="input-label">Replace File (Optional)</label>
                        <input type="file" id="file" name="file" class="input-field">

                        <label for="author" class="input-label">Author</label>
                        <input type="text" id="author" name="author" class="input-field" value="{{ $document->author }}">

                        <label for="field" class="input-label">Field</label>
                        <input type="text" id="field" name="field" class="input-field" value="{{ $document->field }}">

                        <label for="genre" class="input-label">Genre</label>
                        <input type="text" id="genre" name="genre" class="input-field" value="{{ $document->genre }}">
                        <a href="{{ route('lecturer.documents.index') }}"
   style="background-color: #000; color: #fff; border: 1px solid #fff; padding: 8px 16px; border-radius: 4px; text-decoration: none; display: inline-block; margin-bottom: 16px;">
    Back
</a>

                        <button type="submit" class="submit-button">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
