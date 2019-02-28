<div class="card mb-3"> {{-- Sidebar --}}
    <div class="card-header text-secondary">
        <i class="fe fe-list mr-2 text-secondary"></i> Menu
    </div>

    <div class="list-group list-group-flush">
        <a href="{{ route('monitor.show', $city) }}" class="list-group-item list-group-item-action">
            <i class="fe fe-info mr-2 text-secondary"></i> Stadsinformatie
        </a>
        <a href="{{ route('monitor.notes', $city) }}" class="list-group-item list-group-item-action">
            <i class="fe fe-file-text mr-2 text-secondary"></i> Notities
        </a>
        <a href="" class="list-group-item list-group-item-action">
            <i class="fe fe-edit mr-2 text-secondary"></i> Handtekeningen
        </a>
    </div>
</div> {{-- /// End sidebar --}}