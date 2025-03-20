document.addEventListener('DOMContentLoaded', function() {
    const dateHeader = document.querySelector('.date-header');

    if (dateHeader) {
        let sortState = null; // Initial state - no sorting

        dateHeader.addEventListener('click', function() {
            if (sortState === null) {
                sortState = 'asc';
                dateHeader.classList.add('sort-asc');
                dateHeader.classList.remove('sort-desc');
                sortTable('asc');
            } else if (sortState === 'asc') {
                sortState = 'desc';
                dateHeader.classList.add('sort-desc');
                dateHeader.classList.remove('sort-asc');
                sortTable('desc');
            } else {
                sortState = null;
                dateHeader.classList.remove('sort-asc', 'sort-desc');
                sortTable(null);
            }
        });
    }

    function sortTable(order) {
        console.log('Sorting table:', order);
    }
});
