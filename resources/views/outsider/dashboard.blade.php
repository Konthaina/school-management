<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Global Styles (reuse as is) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #343a40;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Search and Filter */
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            width: 300px;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        /* Tabs */
        .tabs-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .tabs {
            display: flex;
            gap: 20px;
        }

        .tab {
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            background-color: #f1f3f5;
            color: #343a40;
        }

        .tab.active {
            background-color: #007bff;
            color: white;
        }

        .sort-dropdown {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 1rem;
            width: 200px;
        }

        /* Document List */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f1f3f5;
        }

        .tag {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .tag.book { background: #ffe3e3; color: #d6336c; }
        .tag.lesson { background: #d4edda; color: #28a745; }
        .tag.revision { background: #fff3cd; color: #ffc107; }
    </style>

    <!-- Main Container -->
    <div class="container">
        <!-- Search Section -->
        <div class="search-container">
            <form action="{{ route('outsider.dashboard') }}" method="GET">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search documents..."
                    value="{{ request('search') }}"
                >
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>

        <!-- Tabs and Sort Section -->
        <div class="tabs-container">
            <div class="tabs">
                <a href="{{ route('outsider.dashboard', ['sort_by' => 'created_at']) }}"
                   class="tab {{ request('sort_by', 'created_at') === 'created_at' ? 'active' : '' }}">
                   Newest
                </a>
                <a href="{{ route('outsider.dashboard', ['sort_by' => 'name']) }}"
                   class="tab {{ request('sort_by') === 'name' ? 'active' : '' }}">
                   All
                </a>
            </div>
            <form action="{{ route('outsider.dashboard') }}" method="GET">
                <select name="sort_by" class="sort-dropdown" onchange="this.form.submit()">
                    <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Sort by: Newest</option>
                    <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Sort by: Title</option>
                    <option value="publication_year" {{ request('sort_by') === 'publication_year' ? 'selected' : '' }}>Sort by: Year</option>
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
            </form>
        </div>

        <!-- Documents List Section -->
        <table>
            <thead>
                <tr>
                    <th>Document Title</th>
                    <th>Type</th>
                    <th>Publication Year</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentDocuments as $document)
                <tr>
                    <td>
                        <!-- Document name without a link -->
                        <span style="color: #6c757d;">{{ $document->name }}</span>
                    </td>
                    <td>
                        @if($document->genre === 'book')
                            <span class="tag book">Book</span>
                        @elseif($document->genre === 'lesson')
                            <span class="tag lesson">Lesson</span>
                        @else
                            <span class="tag revision">Revision</span>
                        @endif
                    </td>
                    <td>{{ $document->publication_year }}</td>
                    <td>
                        @if($document->user && $document->user->profile)
                            <img src="{{ asset('storage/' . $document->user->profile->profile_picture) }}"
                                 alt="User" style="border-radius: 50%; width: 32px; height: 32px;">
                        @else
                            <img src="https://via.placeholder.com/32" alt="User" style="border-radius: 50%;">
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No documents found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
