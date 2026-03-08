<div>
    <form action="{{ route('client.conferences.register', $conference) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg px-5">
            Registruotis į konferenciją
        </button>
    </form>
</div>
