function generateGrid() {
    let N = document.getElementById('grid_size').value;

    if (N < 1 || N > 50) {
        alert("Grid size must be between 1 and 50.");
        return;
    }

    let gridContainer = document.getElementById('grid_input');
    gridContainer.innerHTML = "";
    for (let i = 0; i < N; i++) {
        let row = document.createElement("div");
        row.classList.add("grid-row");
        for (let j = 0; j < N; j++) {
            let input = document.createElement("input");
            input.type = "number";
            input.name = `grid_data[${i}][${j}]`;
            input.min = "0";
            input.max = "1000";
            input.required = true;
            row.appendChild(input);
        }
        gridContainer.appendChild(row);
    }
}
window.generateGrid = generateGrid;