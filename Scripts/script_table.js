/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */
window.onload = function() {


    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');

    const rowsArray = Array.from(rows);

    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
    const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
    const columnIndex = columns.findIndex(column => column == event.target);
    console.log(rowIndex, columnIndex)
    switch_elems(rowIndex, columnIndex);
})
}

function switch_elems(i, j) {
    document.cookie = "row_clicked=" + i;
    document.cookie = "col_clicked=" + j;
    location.reload();
}