@if ($errors->any())
    
    <div class="column m-5 p-3 alert alert-danger shadow-sm rounded">
        @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    </div>

@endif