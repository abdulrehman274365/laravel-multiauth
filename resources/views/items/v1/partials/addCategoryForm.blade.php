{{-- CREATE NEW CATEGORY MODAL --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary save-category-btn">
                        Save Category
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.save-category-btn', function () {
            validateData();
        });

        function validateData() {
            var category_name = $('input[name="category_name"]');
            if(category_name.val()){
               category_name.removeClass('is-invalid')
               category_name.addClass('is-valid')
                console.log('Proceed To Submit');
            }else{
               category_name.addClass('is-invalid')
               category_name.removeClass('is-valid')
            }
        }
    });
</script>