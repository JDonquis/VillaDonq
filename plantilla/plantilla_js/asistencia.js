const head_table = document.querySelector("thead tr");
const input_n_classes = document.querySelector("#input_n_classes");
const th_total = document.querySelector(".th_total");
const all_students_row = document.querySelectorAll("tbody tr");
const all_students_name = document.querySelectorAll("tbody .student_name");
const select_all_check = document.querySelector("#marcar_todos");
const past = document.querySelector(".past");
const future = document.querySelector(".future");

const all_row_check = document.querySelectorAll("tbody .marcar_fila_input");
let all_cells = document.querySelectorAll(".each_cell");
const all_total_td = document.querySelectorAll(".each_total");
let actual_n_classes = +input_n_classes.value;

function addOrRemoveCells(future_n_classes) {
  let n = future_n_classes - actual_n_classes;

  // insert new colums
  if (n > 0) {
    for (let i = actual_n_classes; i < future_n_classes; i++) {
      const th = document.createElement("th");
      th.innerHTML = `
    <label for="c${i + 1}" title="marcar toda la columna ${i + 1}">
        ${i + 1}
        <input type="checkbox" class="marcar_col_input" name="" id="c${i + 1}">
    </label>
    `;
      head_table.insertBefore(th, th_total);

      all_students_row.forEach((row) => {
        const td = document.createElement("td");
        td.classList.add("each_cell");
        row.insertBefore(td, row.lastElementChild);
      });
    }
  }

  // Remove colums
  if (n < 0) {
    for (let i = 0; i < Math.abs(n); i++) {
      head_table.children[future_n_classes + 1].remove();
      all_students_row.forEach((row) => {
        row.children[future_n_classes + 1].remove();
      });
    }
  }
  actual_n_classes = future_n_classes;
}

// change the number of classes
input_n_classes.onchange = () => {
  addOrRemoveCells(+input_n_classes.value);

  all_cells = document.querySelectorAll(".each_cell");
  activateClick();
  fillColumn();
  fillAll();
  getData();
  // console.log(history);
};

// event select asisted when click in each cell
function activateClick() {
  all_cells.forEach((each_cell) => {
    each_cell.onclick = () => {
      each_cell.classList.toggle("attended");
      getData();
    };
  });
}
activateClick();

// event -- fill all the file of an student
all_row_check.forEach((row_check) => {
  row_check.onchange = () => {
    let n_row = row_check.id[1] - 1;
    let actual_row = all_students_row[n_row].querySelectorAll(".each_cell");
    if (row_check.checked) {
      actual_row.forEach((e) => e.classList.add("attended"));
    } else {
      actual_row.forEach((e) => e.classList.remove("attended"));
    }
    getData();
  };
});

//even -- fill all the colum of a class
function fillColumn() {
  document.querySelectorAll(".marcar_col_input").forEach((el) => {
    el.onchange = () => {
      let actual_col = el.id.slice(1);
      if (el.checked) {
        all_students_row.forEach((e) =>
          e.children[actual_col].classList.add("attended")
        );
      } else {
        all_students_row.forEach((e) =>
          e.children[actual_col].classList.remove("attended")
        );
      }
      getData();
    };
  });
}
fillColumn();

// event select all cell
function fillAll() {
  select_all_check.onchange = () => {
    if (select_all_check.checked) {
      all_cells.forEach((each_cell) => each_cell.classList.add("attended"));
    } else {
      all_cells.forEach((each_cell) => each_cell.classList.remove("attended"));
    }
    getData();
  };
}
fillAll();

// get data
const history = [];
let number_now = history.length;

let all_asist_data = [];
function getData() {
  all_asist_data = [];
  for (let i = 0; i < all_students_row.length; i++) {
    let obj = {};
    obj.estudiante = all_students_name[i].textContent;
    let asist_hist = [];

    all_students_row[i].querySelectorAll(".each_cell").forEach((each_cell) => {
      asist_hist.push(each_cell.classList.contains("attended") ? 1 : 0);
    });

    obj.asistencia = asist_hist;
    let total =
      (asist_hist.reduce((sum, v) => v + sum) / actual_n_classes) * 100;
    total = total % 1 == 0 ? Math.trunc(total) : total.toFixed(1);
    obj.total = total;

    // print total number in totals columns
    all_total_td[i].innerHTML = `${total}%`;
    classDependsTotal(total, i)

    all_asist_data.push(obj);
  }

  history.push(all_asist_data);
  number_now = history.length - 1;
  past.classList.remove("disabled");
  return all_asist_data;
}


// remove or add class of style whether the total is less or more than 75
function classDependsTotal(total, i) {
  if (total >= 75) {
    all_students_name[i].classList.add("min75");
    all_total_td[i].classList.add('min75')
  } else {
    all_students_name[i].classList.remove("min75");
    all_total_td[i].classList.remove('min75')
  }
}


// event: when click in arrows history
document.querySelectorAll(".history_arrows").forEach((arrow) => {
  arrow.onclick = (e) => {
    if (arrow.classList.contains("past")) {
      if (number_now > 0) {
        future.classList.remove("disabled");
        number_now--;
        printHistory(...history.slice(number_now, number_now + 1));
      }
      if (number_now == 0) {
        past.classList.add("disabled");
      }
    }
    if (arrow.classList.contains("future") && number_now < history.length - 1) {
      past.classList.remove("disabled");
      number_now++;
      printHistory(...history.slice(number_now, number_now + 1));
    }
    if (number_now == history.length - 1) {
      future.classList.add("disabled");
    }
  };
});

function printHistory(arr) {
  addOrRemoveCells(arr[0].asistencia.length);
  arr.forEach((e, i) => {
    all_total_td[i].innerHTML = `${e.total}%`;
    classDependsTotal(e.total, i)
    e.asistencia.forEach((v, j) => {
      let actual_cell = all_students_row[i].querySelectorAll(".each_cell")[j];
      v == 0
        ? actual_cell.classList.remove("attended")
        : actual_cell.classList.add("attended");
    });
  });

  input_n_classes.value = actual_n_classes;
  all_asist_data = arr;
}
