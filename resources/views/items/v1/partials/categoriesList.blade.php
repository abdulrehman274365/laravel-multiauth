<div class="modal fade" id="categoriesListModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Categories List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @if($categories->count())
                    @foreach ($categories as $category)
                        <p><strong>{{ $category->name }}</strong></p>
                        <p>{{ $category->email }}</p>
                        <hr>
                    @endforeach
                @else
                    <p>No categories found.</p>
                @endif
            </div>

        </div>
    </div>
</div>