const head_table = document.querySelector("thead tr")
const input_n_classes = document.querySelector("#input_n_classes")
const th_total = document.querySelector(".th_total")
const all_students_row = document.querySelectorAll("tbody tr")
const all_students_name = document.querySelectorAll("tbody .student_name")

const all_row_check = document.querySelectorAll("tbody .marcar_fila_input")
const all_cells = document.querySelectorAll(".each_cell")
const all_total = document.querySelectorAll(".each_total")
let actual_n_classes = input_n_classes.value;


function createAndInsert(new_col) {
    const th = document.createElement('th')
    th.innerHTML = `
    <label for="c${new_col}" title="marcar toda la columna ${new_col}">
        ${new_col}
        <input type="checkbox" class="marcar_col_input" name="" id="c${new_col}">
    </label>
    `
    head_table.insertBefore(th, th_total)

    all_students_row.forEach(row => {
        const td = document.createElement('td')
        td.classList.add("each_cell")
        row.insertBefore(td, row.lastElementChild)
    });
}

function removeCol(index) {
    head_table.children[index].remove()
    all_students_row.forEach(row => {
        row.children[index].remove();
    })
}


input_n_classes.oninput = () => {
    let n_classes = +input_n_classes.value
    let n = n_classes - actual_n_classes
    if (n > 0) {
        for (let i = 0; i < n; i++) {
            createAndInsert(n_classes)
        }
    }
    if (n < 0) {
        for (let i = 0; i < Math.abs(n); i++) {
            removeCol(n_classes + 1)
        }
    }
    actual_n_classes = n_classes
    activateClick()
    fillColumn()
    setTotal()

}

// event select asisted when click in each cell
function activateClick() {
    document.querySelectorAll(".each_cell").forEach(each_cell => {
        each_cell.onclick = () => {
            each_cell.classList.toggle("attended")
            setTotal()
        }
    })
}
activateClick()

// event -- fill all the file of an student 
all_row_check.forEach(row_check => {
    row_check.onchange = () => {
        let n_row = row_check.id[1] - 1
        let actual_row = all_students_row[n_row].querySelectorAll('.each_cell')
        if (row_check.checked) {
            actual_row.forEach(e => e.classList.add('attended'))
        } else {
            actual_row.forEach(e => e.classList.remove('attended'))
        }
        setTotal()
    }
})

//even -- fill all the colum of a class
function fillColumn() {
    document.querySelectorAll(".marcar_col_input").forEach(el => {
        el.onchange = () => {
            let actual_col = el.id.slice(1)
            if (el.checked) {
                all_students_row.forEach(e => e.children[actual_col].classList.add('attended'))
            } else {
                all_students_row.forEach(e => e.children[actual_col].classList.remove('attended'))
            }
            setTotal()
        }
    });
}
fillColumn()

// event select all cell 
const select_all_check = document.querySelector("#marcar_todos")
select_all_check.onchange = () => {
    if (select_all_check.checked) {
        all_cells.forEach(each_cell => each_cell.classList.add('attended'))
    } else {
        all_cells.forEach(each_cell => each_cell.classList.remove('attended'))
    }
    setTotal()
}



function setTotal() {
    let i = 0
    all_total.forEach(t => {

        t.innerHTML = getData()[i].total
        i++
    })
}

// get data
function getData() {
    const all_asist_data = []
    for (let i = 0; i < all_students_row.length; i++) {
        let obj = {}
        obj.estudiante = all_students_name[i].textContent
        let asist_hist = []
        all_students_row[i].querySelectorAll('.each_cell').forEach(each_cell => {
            asist_hist.push(each_cell.classList.contains('attended') ? 1 : 0)
        }) 
        obj.asistencia = asist_hist
        let total = ((asist_hist.reduce((sum, v) => v + sum) / actual_n_classes) * 100).toFixed(1)
        obj.total = total
        all_asist_data.push(obj)
    }



    // all_students_name.forEach(student_name => {
    //     let obj = {}
    //     obj.estudiante = student_name.textContent
    // })
        // obj.historial_de_asistencia = row.children.slice(1, actual_n_classes)


    return all_asist_data
}
console.log(getData());