<title>Theme change - Dashboard</title>
<x-backend.app-layout>
    <div>
        <form action="{{route('theme.store')}}" method="POST">
            @csrf
            <h3 class="text-xl font-semibold mb-5">Select Themes</h3>

            <div>
                <input @if ($theme->theme_name == "default white")
                    checked
                @endif type="radio" name="theme_name" id="default" value="default white">
                <label for="default">Default White</label>
            </div>
            <div>
                <input @if ($theme->theme_name == "red")
                    checked
                @endif type="radio" name="theme_name" id="red" value="red">
                <label for="red">Red</label>
            </div>
            <div>
                <input @if ($theme->theme_name == "green")
                    checked
                @endif type="radio" name="theme_name" id="green" value="green">
                <label for="green">Green</label>
            </div>
            <div>
                <input @if ($theme->theme_name == "blue")
                    checked
                @endif type="radio" name="theme_name" id="blue" value="blue">
                <label for="blue">Blue</label>
            </div>
            <div>
                <input class="btn btn-primary p-2 w-28" type="submit" value="Save Changes">
            </div>
        </form>
    </div>
</x-backend.app-layout>