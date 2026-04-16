<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<style>
    .board {
        display: flex;
        gap: 20px;
        padding: 20px;
        align-items: flex-start;
    }

    .column {
        width: 280px;
        background: #f4f5f7;
        padding: 12px;
        border-radius: 10px;
    }

    .column h3 {
        text-align: center;
        margin-bottom: 10px;
    }

    .task-list {
        min-height: 100px;
        padding: 5px;
    }

    .task {
        background: #fff;
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        cursor: grab;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        transition: 0.2s ease;
    }

    .task:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .task.dragging {
        opacity: 0.6;
    }

    .placeholder {
        height: 45px;
        border: 2px dashed #bbb;
        border-radius: 8px;
        background: rgba(0, 0, 0, 0.03);
    }
</style>

<div class="board">

    <!-- TODO -->
    <div class="column">
        <h3>Todo</h3>
        <div class="task-list" data-area="1">
            <div class="task" data-id="1">Task 1</div>
            <div class="task" data-id="2">Task 2</div>
        </div>
    </div>

    <!-- IN PROGRESS -->
    <div class="column">
        <h3>In Progress</h3>
        <div class="task-list" data-area="2">
            <div class="task" data-id="3">Task 3</div>
        </div>
    </div>

    <!-- DONE -->
    <div class="column">
        <h3>Done</h3>
        <div class="task-list" data-area="3">
            <div class="task" data-id="4">Task 4</div>
        </div>
    </div>

</div>
<script>
    $(function () {

        // ✅ ENABLE JIRA STYLE DRAG & DROP
        $(".task-list").sortable({
            connectWith: ".task-list",
            placeholder: "placeholder",
            forcePlaceholderSize: true,
            cursor: "move",
            opacity: 0.8,

            start: function (event, ui) {
                ui.item.addClass("dragging");
            },

            stop: function (event, ui) {
                ui.item.removeClass("dragging");

                // 🔥 Update backend after every drop
                updateBoard();
            }
        }).disableSelection();


        // ✅ FUNCTION: COLLECT ALL DATA LIKE JIRA
        function updateBoard() {

            let data = [];

            $(".task-list").each(function () {

                let areaId = $(this).data("area");

                $(this).find(".task").each(function (index) {

                    data.push({
                        id: $(this).data("id"),
                        order: index + 1,
                        board_area_id: areaId
                    });

                });

            });

            console.log("Updated Board:", data);

            // 🔥 SEND TO LARAVEL
            $.ajax({
                url: "/tickets/reorder", // change to your route
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    orders: data
                },
                success: function (res) {
                    console.log("Saved successfully");
                },
                error: function (err) {
                    console.log("Error saving board", err.responseText);
                }
            });

        }

    });
</script>