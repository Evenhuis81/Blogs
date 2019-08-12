@if ($errors->any())
            <div class="notification is-danger">
                {{-- <ul style="list-style: none; margin: 0"> --}}
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif